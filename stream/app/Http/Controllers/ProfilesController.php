<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;

class ProfilesController extends Controller
{
    //these is to display user info and profile
    public function show(User $user)
    {
        $profiles = $user->profiles; // Assuming you have a profiles relationship on the User model
        return Inertia::render('Auth/Profile', [
            'user' => $user,
            'profiles' => $profiles
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        // Add your logic here
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id' => 'required|string',
        ]);
        return redirect()->back();
    }
}
