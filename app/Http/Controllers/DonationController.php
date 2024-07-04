<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class DonationController extends Controller
{

    public function showDonateForm()
    {
        return view('donate');
    }

    public function createCheckoutSession(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Donation',
                        ],
                        'unit_amount' => $request->amount * 100, // amount in cents
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('donate.form') . '?success=true',
                'cancel_url' => route('donate.form') . '?canceled=true',
            ]);

            return redirect($session->url, 303);
        } catch (\Exception $e) {
            return redirect()->route('donate.form')->with('error_message', $e->getMessage());
        }
    }
    }
    

