<?php declare (strict_types = 1);

class SearchController extends GuardController
{
    public function rest(): void
    {
        $text = Input::post('text');
        $users = DB::query("SELECT user_id, username as name, 'user' as type FROM users where username like '%%s%' LIMIT 50", $text);
        $orgs = DB::query("SELECT organization_id, name, 'organization' as type FROM organization where name like '%%s%' LIMIT 50", $text);
        $results = array_merge($users, $orgs);
        $this->json(200, [
            'results' => $results,
        ]);
    }
}
