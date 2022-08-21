<?php declare(strict_types=1);

class CronController extends Controller {
    function index(): void {
        DB::query('UPDATE stats SET coins = coins + 2');
        $this->json(200, null);
    }

    function hourly(): void {
        DB::query('UPDATE stats SET points = coins');
        $users = DB::query('select * from stats order by points desc');
        foreach($users as $key => $user) {
            DB::query('UPDATE stats SET ranking = %d where user_id = %d', $key + 1, $user['user_id']);
        }
        unset($users);

        DB::query('UPDATE organization SET points = coins');
        $organizations = DB::query('select * from organization order by points desc');
        foreach($organizations as $key => $org) {
            DB::query('UPDATE organization SET ranking = %d where organization_id = %d', $key + 1, $org['organization_id']);
        }

        unset($organizations);

        // badges
        $this->json(200, null);
    }

    function test(): void {
        Admin::generateUsers(10);
        Admin::generateServers();
        $this->json(200, null);
    }
}