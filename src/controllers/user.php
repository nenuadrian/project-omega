<?php declare (strict_types = 1);

class UserController extends GuardController
{
    public function settings_rest(): void
    {
        if (Input::post('data')) {
            $settings = Settings::byUserId(intval($this->user['user_id']));
            $this->json(200, $settings);
        } else {
            $this->json(200);
        }
    }

    public function remove(): void
    {
        $this->json(200);
    }

    public function logout(): void
    {
        //Session::logout();
        $this->json(200);
    }

}
