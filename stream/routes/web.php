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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// send the user register page 
Route::get('/', function () {
    return redirect()->route('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/payment', function () {
        return Inertia::render('Auth/Payment');
    })->name('payment');
    
    Route::post('/subscription', [SubcriptionController::class, 'subscription'])->name('subcription');
});

// these contain if the user have subscribed or not
    Route::get('/Welcome/profiles/{user}', function () {
        return Inertia::render('Welcome');
        return redirect()->route('Welcome');
    })->name('Welcome')->middleware(CheckSubscription::class);

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
