<?php declare(strict_types=1);

class App extends Model {
    protected static string $table = 'server_app';
    protected static string $identityColumn = 'app_id';
    private static array $apps = [
        1 => [
            'id' => 1,
            'name' => 'Mining v1',
            'mining' => true,
            'cost' => 10,
        ],
        2 => [
            'id' => 2,
            'name' => 'DDOS v1',
            'ddos' => true,
            'cost' => 10,
        ],
         3 => [
            'id' => 3,
            'name' => 'Scanner v1',
            'scan' => true,
            'cost' => 10,
        ],
         4 => [
            'id' => 4,
            'name' => 'Brute-forcing tool v1',
            'break' => true,
            'cost' => 10,
         ],
         5 => [
            'id' => 5,
            'name' => 'Binary analyser v1',
            'analyse' => true,
            'cost' => 10,
        ]
    ];

    static function forType(int $type) {
        if (!isset(App::$apps[$type])) {
            throw new Exception("Invalid app");
        }
        return App::$apps[$type];
    }

    static function byServerId(int $serverId): array {
        return DB::query("SELECT * FROM " . static::$table . " where server_id = %s", $serverId);
    }
}