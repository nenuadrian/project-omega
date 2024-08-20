<?php declare(strict_types=1);
use MathPHP\SetTheory\Set;
use MathPHP\SetTheory\ImmutableSet;
use MathPHP\Statistics\Average;

class OANDA extends Model {
  private static string $id;
  private static bool $live = false;
  
  private static function headers() {
    return array('Accept' => 'application/json',
                         'Content-Type' => 'application/json',
                         'Authorization' => 'Bearer ' . (static::$live ? Configs::get('oanda_demo') : Configs::get('oanda_demo')));
    }
  
    private static function url() {
      return static::$live ? 'https://api-fxpractice.oanda.com/v3/' : 'https://api-fxpractice.oanda.com/v3/';
    }
  
    private static function api($endpoint) {
        $request = WpOrg\Requests\Requests::get(static::url() . $endpoint, static::headers());
        return json_decode($request->body, true);
    }
  
    private static function put($endpoint) {
        $request = WpOrg\Requests\Requests::put(static::url()  . $endpoint, static::headers());
        return json_decode($request->body, true);
    }
  
    private static function post($endpoint, $data) {
        $request = WpOrg\Requests\Requests::post(static::url()  . $endpoint, static::headers(), json_encode($data));
        return json_decode($request->body, true);
    }
  
    static function selectAccount(string $id) {
      static::$id = $id;
    }
  
    static function orders(string $type): array {
        return static::api("/accounts/" . static::$id . "/orders?count=500&state=$type");
    }
  
    static function trades(string $type): array {
        return static::api("/accounts/" . static::$id . "/trades?count=500&state=$type");
    }
  
    static function summary(): array {
        return static::api("/accounts/" . static::$id . "/summary");
    }
  
    static function pricing(string $curr): array {
        return static::api("/accounts/" . static::$id . "/pricing?instruments=$curr&includeHomeConversions=true");
    }
  
    static function candles(string $curr, string $from, string $to, int $count = 3500): array {
        return static::api("/accounts/" . static::$id . "/instruments/$curr/candles?from=$from&to=$to&count=$count&price=BA");
    }
  
    static function accounts(): array {
        return static::api('accounts');
    }
  
    static function closeTrade($id): array {
      return static::put("/accounts/" . static::$id . "/trades/$id/close");
    }
  
    static function placeOrder($order): array {
      return static::post("/accounts/" . static::$id . "/orders", $order);
    }
  
  static function statsFromTrades($tradesClosed) {
      $pl = array_column($tradesClosed, 'realizedPL');
        $plPositive = array_filter($pl, function($p) { return $p >= 0; });
        $plNegative = array_filter($pl, function($p) { return $p < 0; });
        $closingDatesValues = [];
        foreach($tradesClosed as $trade) {
          $date = explode('T', $trade['closeTime'])[0];
          if (!isset($closingDatesValues[$date])) {
            $closingDatesValues[$date] = [];
          }
          $closingDatesValues[$date][] = $trade['realizedPL'];
        }
    
        $closingDates = [];
        $counts = [];
        if ($tradesClosed) {
            $begin    = new \DateTime(explode('T', $tradesClosed[0]['closeTime'])[0]);
            $end      = new \DateTime(explode('T', $tradesClosed[count($tradesClosed) - 1]['closeTime'])[0]);
            $interval = DateInterval::createFromDateString('1 day');
            $period   = new DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
              $closingDates[$dt->format("Y-m-d")] = 0;
              $counts[$dt->format("Y-m-d")] = 0;
              if (isset($closingDatesValues[$dt->format("Y-m-d")])) {
                $closingDates[$dt->format("Y-m-d")] = array_sum($closingDatesValues[$dt->format("Y-m-d")]);
                $counts[$dt->format("Y-m-d")] = count($closingDatesValues[$dt->format("Y-m-d")]);
              }
            }
        }
        
        $stats = [
          'trades' => count($tradesClosed),
          'pl' => array_sum($pl),
          'plPositive' => count($plPositive),
          'plNegative' => count($plNegative),
          'avgPlNegative' => $plNegative ? Average::mean($plNegative) : 0,
          'medPlNegative' => $plNegative ? Average::median($plNegative) : 0,
          'avgPlPositive' => $plPositive ? Average::mean($plPositive) : 0,
          'medPlPositive' => $plPositive ? Average::median($plPositive) : 0,
          'avgPl' => $pl ? array_sum($pl)/count($pl) : 0,
          'closingDates' => $closingDates,
          'trades' => $tradesClosed,
          'counts' => $counts,
        ];
      
      return $stats;
    }

}
