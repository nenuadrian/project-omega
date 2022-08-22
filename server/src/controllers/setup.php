<?php declare(strict_types=1);

class SetupController extends Controller {
    function index(): void {
        if (Input::post('action') === 'install') {
            die();
        }
        $this->render('setup');
    }
}
