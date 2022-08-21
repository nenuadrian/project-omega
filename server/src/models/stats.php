<?php declare(strict_types=1);

class Stats extends Model {
    protected static string $table = 'stats';
    protected static string $identityColumn = 'user_id';

    static function all(): array {
        return DB::query("SELECT R.*, R.username as name  FROM " . static::$table . ' R WHERE R.ranking != -1');
    }

    static function top(): array {
        return DB::query("SELECT R.*, R.username as name FROM " . static::$table . ' R  WHERE R.ranking != -1 ORDER BY ranking ASC LIMIT 50');
    }

    static function paginated(int $page): array {
        return DB::query("SELECT R.*, R.username as name FROM " . static::$table . ' R WHERE R.ranking != -1 ORDER BY ranking ASC LIMIT ' . (($page - 1) * 50) . ',' . ($page * 50));
    }
}