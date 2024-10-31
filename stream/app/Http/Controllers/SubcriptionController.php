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
            'subscription_type' => ['required', 'string', 'in:basic,standard,premium'], // Updated valid types
            'subscription_amount' => ['required', 'numeric'],
            'card_number' => ['required', 'string'],
            'cvv' => ['required', 'string'],
            'expiry_date' => ['required', 'string'],
            'card_holder' => ['required', 'string'],
            'end_date' => ['required', 'date'],
        ], [
            'subscription_type.*' => 'Please select a valid subscription plan (basic, premium, or enterprise)',
            'subscription_amount.*' => 'Please enter a valid amount between 0 and 999,999.99',
            'card_number.*' => 'Please enter a valid 16-digit card number',
            'cvv.*' => 'Please enter a valid 3 or 4 digit CVV number',
            'expiry_date.*' => 'Expiry date must be a future date',
            'end_date.*' => 'End date must be after the expiry date',
        ]);

        // Convert MM/YY to proper datetime format
    $expiryDate = \DateTime::createFromFormat('m/y', $request->expiry_date);
    $formattedExpiryDate = $expiryDate->format('Y-m-d');

        $Subscription = Subcription::create([
            'user_id' => Auth::id(),
            'subscription_type' => $request->subscription_type,
            'Subscription_amount' => $request->subscription_amount, // Fix capitalization
            'card_number' => Hash::make($request->card_number),
            'cvv' => Hash::make($request->cvv),
            'card_holder' => Hash::make($request->card_holder),
            'expiry_date' => $formattedExpiryDate,
            'end_date' => $request->end_date,
        ]);

        if ($Subscription) {
            return redirect()->route('profiles.show', ['user' => Auth::user()->id]);
        } else {
            return redirect()->route('subscription.Error');
        }
    }
}
