<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\ResetPasswordMail;

class ForgotPasswordController extends Controller
{
    // Show the forgot password form
    public function showForgotForm()
    {
        return view('pages.forgetPassword');
    }

    // Handle sending reset link
    public function sendResetLink(Request $request)
    {
        // Validate that email exists in users table
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Get user by email
        $user = User::where('email', $request->email)->first();

        // Generate random token
        $token = Str::random(64);

        // Delete any old tokens
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // Insert new token
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => Hash::make($token),
            'created_at' => now(),
        ]);

        // Build the reset link
        $resetLink = url('/reset-password/' . $token . '?email=' . urlencode($request->email));

        // Send the email using ResetPasswordMail, passing reset link and user's name
        Mail::to($request->email)->send(new ResetPasswordMail($resetLink, $user->name));

        // Optional: log the link for testing
        \Log::info("Password reset link: $resetLink");

        return back()->with('status', 'We have emailed your password reset link!');
    }

    // Show reset form
    public function showResetForm(Request $request, $token)
    {
        $email = $request->query('email');
        return view('pages.reset-password', compact('token', 'email'));
    }

    // Handle password reset
    public function resetPassword(Request $request)
    {
        // Validate input, enforcing password minimum length of 8
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8', // <-- 8 characters minimum
            'token' => 'required',
        ], [
            'password.min' => 'Password must be at least 8 characters long.', // custom message
        ]);

        // Check if token exists and matches
        $record = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        if (!$record || !Hash::check($request->token, $record->token)) {
            return back()->withErrors(['email' => 'Invalid token or email']);
        }

        // Update user's password safely
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete token after successful reset
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('status', 'Password successfully reset!');
    }
}
