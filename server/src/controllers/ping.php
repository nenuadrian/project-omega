<?php declare(strict_types=1);

class HomeController extends Controller {
    function index(): void {
        $this->json(200);
    }
}