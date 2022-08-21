<?php declare(strict_types=1);

class WorldController extends GuardController {
    function index(): void {
        $locations = Location::all();
        $this->json(200, $locations);
    }

    function location(string $locationId): void {
        $location = Location::byId(intval($locationId));
        $servers = Server::byUserId(intval($this->user['user_id']));
        $servers = array_filter($servers, function($server) use($locationId) { return $server['location_id'] == $locationId; });

        $this->json(200, [
            'location' => $location,
            'servers'  => $servers
        ]); 
    }
}
