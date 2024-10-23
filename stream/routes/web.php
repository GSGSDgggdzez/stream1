<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\SubcriptionController;

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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // these is the profile routes
    Route::get('/profiles/{user}', [ProfilesController::class, 'show'])
        ->name('profiles.show');
    Route::post('/profiles', [ProfilesController::class, 'store'])
        ->name('profiles');
        Route::post('/subcriptions', [SubcriptionController::class, 'store']);
});

Route::get('/locations', [RegisteredUserController::class, 'getLocations']);


require __DIR__ . '/auth.php';
