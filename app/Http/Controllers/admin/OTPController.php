<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class OTPController extends Controller {

    public function showLogin() {
        return view('front.account.otp-login');
    }

    // Generate & Send OTP
    public function sendOTP(Request $request) {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request->email)->first();
        $otp = rand(100000, 999999); // Generate 6-digit OTP

        $user->update([
            'otp' => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(5) // Expiry in 5 mins
        ]);

        // Send OTP via email
        Mail::raw("Your OTP is: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject("Your Login OTP");
        });

        return back()->with('success', 'OTP sent to your email.');
    }


    // Verify OTP and Login
    public function verifyOTP(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|digits:6'
        ]);

        // Check if OTP exists and is valid
        $user = User::where('email', $request->email)
        ->where('otp', $request->otp)
        ->where('otp_expires_at', '>', now()) // Ensure it's not expired
        ->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid OTP or expired'], 400);
        }

        // OTP is valid → Mark user as verified (Optional)
        $user->update([
            'otp' => null, // Clear OTP after use
            'otp_expires_at' => null,
            'email_verified_at' => now(), // Mark email as verified if needed
        ]);

        Auth::login($user);
        return response()->json(['message' => 'OTP verified successfully'], 200);
    }
}