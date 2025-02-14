<?php declare(strict_types=1);

class Settings extends Model {
    protected static string $table = 'user_settings';

    static function byUserId(int $userId): ?array {
        return DB::queryFirstRow("SELECT * FROM " . static::$table . " where user_id = %s", $userId);
    }
}