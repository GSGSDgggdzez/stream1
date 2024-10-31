<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Profiles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        // Performance Boost: Using cache to store user profiles for 1 hour (3600 seconds)
        // This reduces database queries and improves response time for frequently accessed profiles
        $cacheKey = 'user_profiles_' . $user->id;

        $profiles = Cache::remember($cacheKey, 3600, function () use ($user) {
            return $user->profiles()->with('user')->get();
        });

        $activeProfile = $profiles->first();

        return Inertia::render('Auth/Profile', [
            'user' => $user,
            'profiles' => $profiles,
            'activeProfile' => $activeProfile
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        // Performance Boost: Validating data before processing to prevent unnecessary operations
        $validated = $request->validate([
            'Profile_name' => 'required|string|max:255',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id' => 'required|string',
        ]);

        // Performance Boost: Creating directory only once if not exists
        Storage::disk('public')->makeDirectory('avatars');

        // Performance Boost: Optimized file storage using direct file path
        $avatarPath = Storage::disk('public')->putFile('avatars', $request->file('avatar'));

        // Performance Boost: Single database query for profile creation
        Profiles::create([
            'user_id' => $validated['id'],
            'Profile_name' => $validated['Profile_name'],
            'Avatar_url' => '/storage/' . $avatarPath,
        ]);

        // Performance Boost: Clearing specific cache instead of entire cache
        Cache::forget('user_profiles_' . $validated['id']);

        return redirect()->route('Welcome');
    }
}
