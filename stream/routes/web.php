<?php

use App\Http\Controllers\Auth\EmailVerificationPromptController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\SubcriptionController;
use App\Http\Middleware\CheckSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// send the user register page 
Route::get('/', function () {
    return redirect()->route('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/payment', function () {
        return Inertia::render('Auth/Payment');
    })->name('payment');
    
    Route::post('/subscription', [SubcriptionController::class, 'subscription'])->name('subcription');

    Route::post('/create-checkout-session', function (Request $request) {
        $stripe = new \Stripe\Stripe();
        $stripe::setApiKey(env('Stripe_API_Key'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $request->subscription_type,
                    ],
                    'unit_amount' => $request->subscription_amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'subscription',
            'success_url' => route('profiles.show', ['user' => Auth::id()]),
            'cancel_url' => route('payment'),
        ]);

        return response()->json(['url' => $session->url]);
    })->name('checkout.session');
});

Route::post('/stripe/webhook', [SubcriptionController::class, 'handleWebhook'])->name('stripe.webhook');

// these contain if the user have subscribed or not
    Route::get('/Welcome/profiles/{user}', function () {
        return Inertia::render('Welcome');
        return redirect()->route('Welcome');
    })->name('Welcome')->middleware(CheckSubscription::class);

    // Route::get('/Welcome/profiles/{user}', function () {
    //     return Inertia::render('Support');
    //     return redirect()->route('Support');
    // })->name('Support')->middleware(CheckSubscription::class);


    Route::get('/dashboard', function () {
        return Inertia::render('dashboard');
        return redirect()->route('dashboard');
    })->name('dashboard')->middleware(CheckSubscription::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->middleware(CheckSubscription::class)->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->middleware(CheckSubscription::class)->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware(CheckSubscription::class)->name('profile.destroy');
    Route::get('/profiles/{user}', [ProfilesController::class, 'show'])->middleware(CheckSubscription::class)->name('profiles.show');
    Route::post('/profiles', [ProfilesController::class, 'store'])->middleware(CheckSubscription::class)->name('profiles');
    Route::post('/send-support-email', [EmailVerificationPromptController::class, 'sendEmail'])->name('send.support.email');



Route::get('/locations', [RegisteredUserController::class, 'getLocations']);



require __DIR__ . '/auth.php';
