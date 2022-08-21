<?php declare(strict_types=1);

class AuthController extends Controller {
    function validate(): void {
        $user = Session::validateSession();
        $this->json(200, $user);
    }

    function login(): void {
        if (Input::post('id') && Input::post('password')) {
            $session_hash = null;
            $session_hash = User::login(Input::post('id'), Input::post('password'));
            
            $this->json(200, [
                "sessionHash" => $session_hash
            ]);
        } else {
            throw new Exception("Missing data");
        } 
    }

    function register(): void {
        if (Input::post('username') && Input::post('email') && Input::post('password')) {
            if (!filter_var(Input::post('email'), FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid e-mail format!");
            }
            $session_hash = null;
            $userId = User::register(Input::post('username'), Input::post('email'), 
                Input::post('password'));
            
            $session_hash = User::login(Input::post('email'), Input::post('password'));

            $this->json(200, [
                "sessionHash" => $session_hash
            ]);
        } else {
            throw new Exception("Missing data");
        }
    }


    function forgot(): void {
        if (Input::post('email') && filter_var(Input::post('email'), FILTER_VALIDATE_EMAIL)) {
            $this->json(200);
        } else {
            throw new Exception('Missing data');
        }
    }

}