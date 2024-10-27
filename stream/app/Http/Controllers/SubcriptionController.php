<?php

namespace App\Http\Controllers;

use App\Models\Subcription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class SubcriptionController extends Controller
{
    //   


    public function subscription(Request $request)
    {
        $request->validate([
            'subscription_type' => ['required', 'string', 'in:basic,premium,enterprise'],
            'subscription_amount' => ['required', 'numeric', 'min:0', 'max:999999.99'],
            'card_number' => ['required', 'string', 'regex:/^[0-9]{16}$/'],
            'cvv' => ['required', 'string', 'regex:/^[0-9]{3,4}$/'],
            'expiry_date' => ['required', 'date', 'after:today'],
            'end_date' => ['required', 'date', 'after:expiry_date'],
            'card_holder' => ['required', 'string', 'max:255'],
        ], [
            'subscription_type.*' => 'Please select a valid subscription plan (basic, premium, or enterprise)',
            'subscription_amount.*' => 'Please enter a valid amount between 0 and 999,999.99',
            'card_number.*' => 'Please enter a valid 16-digit card number',
            'cvv.*' => 'Please enter a valid 3 or 4 digit CVV number',
            'expiry_date.*' => 'Expiry date must be a future date',
            'end_date.*' => 'End date must be after the expiry date',
        ]);

        $Subscription = Subcription::create([
            'user_id' => Auth::id(),
            'subscription_type' => $request->subscription_type,
            'subscription_amount' => $request->subscription_amount,
            'card_number' => Hash::make($request->card_number),
            'cvv' => Hash::make($request->cvv),
            'card_holder' => Hash::make($request->card_holder),
            'expiry_date' => Hash::make($request->expiry_date),
            'end_date' => $request->end_date,
        ]);

        if ($Subscription) {
            return redirect()->route('subscription.success');
        }else{
            return redirect()->route('subscription.Error');
        }
}
}