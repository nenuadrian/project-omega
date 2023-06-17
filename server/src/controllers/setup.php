<?php declare(strict_types=1);

class SetupController extends Controller {
    function index(): void {
      $dbFile = dirname(__FILE__) . '/../../DB.sql';
      
      if (!file_exists($dbFile)) {
          die('DB.sql is missing - expected in: ' . $dbFile);
      }
      
      $envFile = dirname(__FILE__) . '/../configs/environment.json';

      if (Input::post('action') === 'install') {
          $configs = [
              "db_host" => Input::post('db_host'),
              "db_user" => Input::post('db_user'),
              "db_pass" => Input::post('db_pass'),
              "db_name" => Input::post('db_name')
          ];
        
          if (file_exists($envFile)) {
            unlink($envFile);
          }
        
          file_put_contents($envFile, json_encode($configs, JSON_PRETTY_PRINT));
          
          require dirname(__FILE__) . '/../core/database.php';
          
          $sqls = explode(";\n", file_get_contents($dbFile));
          foreach($sqls as $sql) {
              if ($sql) {
                  DB::query($sql);
              }
          }

          $this->redirect('/');
      }
      View::render('setup');
    }
}
