<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Inertia\Response;
use App\Mail\SupportEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|Response
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(route('dashboard', absolute: false))
                    : Inertia::render('Auth/VerifyEmail', ['status' => session('status')]);
    }
    // these is to send support An email

    public function sendEmail(Request $request)
    {
        $request->validate([
            'First_name' => 'required|string',
            'Last_name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);

        Mail::send('emails.support', [
            'firstName' => $request->First_name,
            'lastName' => $request->Last_name,
            'email' => $request->email,
            'message' => $request->message
        ], function($msg) {
            $msg->to('supper-hubcap-even@duck.com')
                ->subject('Support Request');
        });
        
        
        

        return redirect()->back()->with('success', 'Support request sent successfully!');
    }
}
