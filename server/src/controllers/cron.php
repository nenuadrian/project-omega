<?php declare(strict_types=1);

class CronController extends Controller {
    function index(): void {
        $this->json(200);
    }

    function hourly(): void {
       
        $this->json(200);
    }

    function test(): void {
        Admin::generateUsers(10);
        $this->json(200);
    }
}
