<?php declare(strict_types=1);

$file = dirname(__FILE__) . '/../configs/environment.json';

if (!file_exists($file)) {
    die('Missing environment configs');
}

$configs = json_decode(file_get_contents($file), true);

DB::$host     = $configs['db_host'];
DB::$user     = $configs['db_user'];
DB::$password = $configs['db_pass'];
DB::$dbName   = $configs['db_name'];
