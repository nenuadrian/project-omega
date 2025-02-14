<?php declare(strict_types=1);

abstract class Task extends Model {
    protected static string $table = 'task';
    protected static string $identityColumn = 'task_id';
}
