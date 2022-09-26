<?php declare(strict_types=1);

class SetupController extends Controller {
    function index(): void {
        if (Input::post('action') === 'install') {
            $configs = [
                "db_host" => Input::post('db_host'),
                "db_user" => Input::post('db_user'),
                "db_pass" => Input::post('db_pass'),
                "db_name" => Input::post('db_name')
            ];
            file_put_contents('server/src/configs/environment.json', json_encode($configs));
            echo 'done';
            die();
        }
        $this->render('setup');
    }
}
