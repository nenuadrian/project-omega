<?php declare(strict_types=1);

class ProfileController extends GuardController {
    function rest(): void {
        $this->view_rest($this->user['user_id']);
    }
    
    function view_rest(string $userId): void {
        $user   = Stats::byId(intval($userId));

        $this->json(200, [
            'user'          => $user,
            'rank'          => $user,
        ]);
    }

}
