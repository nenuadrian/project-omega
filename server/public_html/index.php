<?php declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('max_execution_time', '300'); //300 seconds = 5 minutes
set_time_limit(300);

error_reporting(E_ALL);

define('CORE_DIR', '../project-omega/server');

header("Access-Control-Allow-Origin: *");

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: *");
    exit(0);
}

require CORE_DIR . '/vendor/autoload.php';
require CORE_DIR . '/src/core/core.php';

Profiler::start();

mvc();       

Profiler::end();
Profiler::display();    
