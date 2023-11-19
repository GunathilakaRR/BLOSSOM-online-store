<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;

class StripePaymentController extends Controller
{
    public function payment(Request $request){

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [[
              'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                  'name' => 'T-shirt',
                ],
                'unit_amount' => 2000,
              ],
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'http://localhost:4242/success',
            'cancel_url' => 'http://localhost:4242/cancel',
          ]);

          return redirect($session->url);

                // \Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));

                // $response = \Stripe\Checkout\Session::create([
                // 'line_items' => [
                //     [
                //     'price_data' => [
                //         'currency' => 'usd',
                //         'product_data' => ['name' => 'T-shirt'],
                //         'unit_amount' => $request->price * 100,

                //     ],
                //     'adjustable_quantity' => [
                //         'enabled' => true,
                //         'minimum' => 1,
                //         'maximum' => 10,
                //     ],
                //     'quantity' => 1,
                //     ],
                // ],

                // 'mode' => 'payment',
                // 'success_url' => route('stripe_success'),
                // 'cancel_url' => route('stripe_cancel'),
                // ]);

                // return redirect()->away($response->url);
    }




    public function success(){
        return 'success';
    }

    public function cancel(){
        return 'canceled';
    }
}
