<?php declare (strict_types = 1);

class PingController extends Controller
{
    public function index(): void
    {
        $this->json(200);
    }
}
