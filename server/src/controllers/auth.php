<?php declare (strict_types = 1);

class AuthController extends Controller
{
    public function validate(): void
    {
        $user = Session::validateSession();
        $this->json(200, $user);
    }

    private function doLogin(): string
    {
        if (Input::post('id') && Input::post('password')) {
            $session_hash = null;
            $session_hash = User::login(Input::post('id'), Input::post('password'));
            return $session_hash;
        } else {
            throw new Exception("Missing data");
        }
    }
    public function login(): void
    {
        $tVars = ['errors' => []];
        try {
            if (Input::post('action') == 'login') {
                $session_hash = $this->doLogin();
                $_SESSION['session_hash'] = $session_hash;
                $this->redirect(BASE_URL . '/app');
            }
        } catch (Exception $error) {
            $tVars['errors'][] = $error->getMessage();
        }
        View::render('auth/login', $tVars);
    }

    private function doRegister(): string
    {
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

    private function captcha($token, $action)
    {
        $data = array('secret' => Configs::get('captcha'), 'response' => $token);
        $response = WpOrg\Requests\Requests::post("https://www.google.com/recaptcha/api/siteverify", [], json_encode($data));
        $arrResponse = json_decode($response->body, true);
        return $arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5;
    }

    public function register(): void
    {
        $tVars = ['errors' => []];
        try {
            if (Input::post('action') == 'register') {
                $session_hash = $this->doRegister();
                $_SESSION['session_hash'] = $session_hash;
                $this->redirect(BASE_URL . '/app');
            }
        } catch (Exception $error) {
            $tVars['errors'][] = $error->getMessage();
        }
        View::render('auth/register', $tVars);
    }

    public function forgot(): void
    {
        if (Input::post('email') && filter_var(Input::post('email'), FILTER_VALIDATE_EMAIL)) {
            $this->json(200);
        } else {
            throw new Exception('Missing data');
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect(BASE_URL);
    }

}
