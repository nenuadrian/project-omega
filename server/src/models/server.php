<?php declare(strict_types=1);

abstract class Server extends Model {
    protected static string $table = 'server';
    protected static string $identityColumn = 'server_id';

    public static function byId(int $id): ?array {
        $data = DB::queryFirstRow("SELECT *, TO_SECONDS( NOW() ) - TO_SECONDS(last_mined_at) as since_last_mine FROM " . static::$table . " WHERE " . static::$identityColumn . " = %d AND deleted_at is null", $id);
        return $data;
    }

    public static function costToUpgrade(int $level): int {
        return $level * 10;
    }

    public static function mined(int $serverId): void {
        DB::query('UPDATE server SET last_mined_at =  NOW() where server_id = %d limit 1', $serverId);
    }
}
