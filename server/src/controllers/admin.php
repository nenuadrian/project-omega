<?php declare(strict_types=1);

class AdminController extends Controller {
    function index(): void {
        $tVars = [];
        if (Input::post('action') == 'generate') {
            $users = Admin::generateUsers(intval(Input::post('n')));
            $tVars['generated'] = $users;
        }

        $tVars['users'] = DB::queryFirstRow('select count(*) as c from users')['c'];
        View::render('admin/home', $tVars);
    }

  
}