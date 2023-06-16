<?php declare(strict_types=1);


class Session extends Model {
    protected static string $table = 'sessions';

    private static function currentSession(): ?string {
        $headers = apache_request_headers();
        $sessionHash = isset($headers['Authorization']) ? $headers['Authorization'] : null;
        $sessionHash = isset($headers['authorization']) ? $headers['authorization'] : null;
        $sessionHash = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : null;
        return $sessionHash;
    }

    public static function validateSession(): ?array {
        $sessionHash = static::currentSession();
        if (!$sessionHash) return null;
        return DB::queryFirstRow("SELECT U.user_id, U.username, U.coins, U.level FROM " . Session::$table . " S left outer join stats U on U.user_id = S.user_id where session_hash = %s and logged_out_at is null", $sessionHash);
    }

    public static function logout(): void {
        $sessionHash = static::currentSession();
        DB::query("UPDATE " . static::$table . " set logged_out_at = CURRENT_TIMESTAMP() WHERE session_hash=%s limit 1", $sessionHash);
    }
}
