<?php declare(strict_types=1);

class AuthController extends Controller {
    function validate(): void {
        $user = Session::validateSession();
        $this->json(200, $user);
    }

    private function doLogin(): string {
        if (Input::post('id') && Input::post('password')) {
            $session_hash = null;
            $session_hash = User::login(Input::post('id'), Input::post('password'));            
            return $session_hash;
        } else {
            throw new Exception("Missing data");
        } 
    }
  
    function login_rest(): void {
          $session_hash = $this->doLogin();

          $this->json(200, [
              "sessionHash" => $session_hash
          ]);
    }
  
   function login(): void {
       if (Input::post('action') == 'login') {
          $session_hash = $this->doLogin();
         $this->redirect(BASE_URL . '/home');
       }
       View::render('auth/login');
    }

    private function doRegister(): string {
        if (Input::post('username') && Input::post('email') && Input::post('password')) {
            if (!filter_var(Input::post('email'), FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid e-mail format!");
            }
            $session_hash = null;
            $userId = User::register(Input::post('username'), Input::post('email'), 
                Input::post('password'));
            
            $session_hash = User::login(Input::post('email'), Input::post('password'));

            return $session_hash;
        } else {
            throw new Exception("Missing data");
        }
    }
  
    function register_rest(): void {
      
          $session_hash = $this->doRegister();

          $this->json(200, [
              "sessionHash" => $session_hash
          ]);
    }

    private function captcha($token, $action) {
        // call curl to POST request 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => Configs::get('captcha'), 'response' => $token)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $arrResponse = json_decode($response, true);
         
        // verify the response 
        return $arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5;
    }
        
    function register(): void {
          if (Input::post('action') == 'register') {
            $session_hash = $this->doRegister();
            $this->redirect(BASE_URL . '/home');
          }
          View::render('auth/register');
    }


    function forgot(): void {
        if (Input::post('email') && filter_var(Input::post('email'), FILTER_VALIDATE_EMAIL)) {
            $this->json(200);
        } else {
            throw new Exception('Missing data');
        }
    }

}
