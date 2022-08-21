<?php declare(strict_types=1);

abstract class GuardController extends Controller {
    protected ?array $user = null;

    public function __construct() {
        $this->user = Session::validateSession();
    }
    
    protected function guard(): bool {
        return !!$this->user;
    }
}
