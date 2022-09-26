<?php declare(strict_types=1);

class ProfileController extends GuardController {
    function rest(): void {
        $this->view($this->user['user_id']);
    }
    
    function view_rest(string $userId): void {
        $user   = Stats::byId(intval($userId));
        $badges = Badge::byUserId(intval($userId));
        $orgs   = Organizations::byUserId(intval($userId));

        $this->json(200, [
            'user'          => $user,
            'rank'          => $user,
            'badges'        => $badges,
            'organizations' => $orgs
        ]);
    }

}
