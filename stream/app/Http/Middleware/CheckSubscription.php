<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Subcription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class CheckSubscription
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('register');
        }

        $hasSubscription = Subcription::where('user_id', Auth::id())->exists();

        if (!$hasSubscription && !$request->routeIs('payment') && !$request->routeIs('subcription')) {
            return redirect()->route('payment');
        }

        return $next($request);
    }
}
