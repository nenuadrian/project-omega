<?php declare(strict_types=1);

class HomeController extends Controller {
    function index(): void {
        View::render('home');
    }

    function subscribe(): void {
        \Stripe\Stripe::setApiKey(Configs::get('stripe'));
        $lineItems = [];
        $lineItems[] = ['price' => '', 'quantity' => 1 ];
        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'subscription',
            'success_url' => BASE_URL . '/home/thanks',
            'cancel_url' => BASE_URL,
          ]);

        $this->redirect($checkout_session->url);
    }
}
