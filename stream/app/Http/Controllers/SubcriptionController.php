<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubcriptionController extends Controller
{
    //

    public function subscription(Request $request)
    {
        $validatedData = $request->validate([
            'subscription_type' => ['required', 'string', 'in:basic,premium,enterprise', 'regex:/^[a-zA-Z0-9\-\_]+$/'],
            'subscription_amount' => ['required', 'numeric', 'min:0', 'max:999999.99', 'regex:/^\d+(\.\d{1,2})?$/'],
            'subscription_status' => ['required', 'string', 'in:active,pending,cancelled,expired'],
            'subscription_session_id' => ['required', 'string', 'uuid', 'unique:subscriptions,session_id'],
            'start_date' => ['required', 'date', 'after_or_equal:today', 'before:end_date', 'date_format:Y-m-d'],
            'end_date' => ['required', 'date', 'after:start_date', 'date_format:Y-m-d', 'before:+1 year'],
        ], [
            'subscription_type.*' => 'Invalid subscription type provided',
            'subscription_amount.*' => 'Invalid amount format or value',
            'subscription_status.*' => 'Invalid subscription status',
            'subscription_session_id.*' => 'Invalid or duplicate session ID',
            'start_date.*' => 'Invalid start date format or value',
            'end_date.*' => 'Invalid end date format or value',
        ]);
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $validatedData['subscription_type'],
                    ],
                    'unit_amount' =>  $validatedData['subscription_amount'],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'http://localhost:4242/success',
            'cancel_url' => 'http://localhost:4242/cancel',
        ]);

        return redirect($checkout_session->url);
    }
}
