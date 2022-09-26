<?php declare(strict_types=1);

class FeedbackController extends GuardController {
    function rest(): void {
        Feedback::insert([
            'user_id' => Session::validateSession()['user_id'],
            'content' => Input::post('feedback')
        ]);
        $this->json(200, null);
    }
}
