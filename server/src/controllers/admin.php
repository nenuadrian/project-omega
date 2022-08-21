<?php declare(strict_types=1);

class AdminController extends Controller {
    function index(): void {
        $tVars = [];
        if (Input::post('action') == 'generate') {
            $users = Admin::generateUsers(intval(Input::post('n')));
            $tVars['generated'] = $users;
        }

        if (Input::post('action') == 'servers') {
            $servers = Admin::generateServers();
            $tVars['generated'] = $servers;
        }

        $tVars['users'] = DB::queryFirstRow('select count(*) as c from users')['c'];
        $tVars['servers'] = DB::queryFirstRow('select count(*) as c from server')['c'];
        $tVars['orgs'] = DB::queryFirstRow('select count(*) as c from organization')['c'];
        $this->render('admin/home', $tVars);
    }

  
}