<?php declare (strict_types = 1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('max_execution_time', '300'); //300 seconds = 5 minutes
set_time_limit(300);

error_reporting(E_ALL);

define('CORE_DIR', dirname(__FILE__) . '/../');

header('Access-Control-Allow-Origin: *');

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: *');
    exit(0);
}

require CORE_DIR . '/vendor/autoload.php';
require CORE_DIR . '/src/core/core.php';

Profiler::start();

if(Input::cookie('consent') === null) {
	// First time visitor
	// Get the user countrycode by ip
	if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	$geo = json_decode(file_get_contents('http://www.geoplugin.net/json.gp?ip='.$ip),True);
	$country_codesEU=['AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DE', 'DK', 'EE', 'EL', 'ES', 'FI', 'FR', 'GB', 'HU', 'IE', 'IT', 'LT', 'LU', 'LV', 'MT', 'NL', 'PL', 'PT', 'RO', 'SE', 'SI', 'SK'];
  if ($geo['geoplugin_countryCode'] == Null || in_array($geo['geoplugin_countryCode'],$country_codesEU)){
		// User is in the EU or we do not know where he is from.
		// Ask for cookies consent, if within 15 minutes the user comes back, they accept
		setcookie("consent", 'false', time() + (60*15));
	}else{
		// The user is not in the EU, so we can set cookies
		setcookie("consent", 'true', time() + (60*15));
	}
} else if (Input::cookie('consent') == 'true') {
    session_start();
} 

if (Input::cookie('consent') === 'false') {
  if (Input::post('cookies') === 'accept') {
    $_COOKIE['consent'] = 'true';
		setcookie("consent", 'true', time() + (90 * 24 * 60 * 60));
  }
}

mvc();

Profiler::end();
Profiler::display();
