<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'name' => 'required|string|max:255',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'role_id' => Role::where('name', 'Reader')->first()->id,
        ]);

        event(new Registered($user));

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
        ], 201);
    }

    // public function sendVerificationMail(Request $request)
    // {
    //     $user = Auth::user();

    //     if (!$user) {
    //         return response()->json([
    //             'message' => 'User not authenticated'
    //         ], 401);
    //     }

    //     if ($user->email_verified_at) {
    //         return response()->json([
    //             'message' => 'Email already verified'
    //         ], 400);
    //     }

    //     $user->sendEmailVerificationNotification();

    //     return response()->json([
    //         'message' => 'Verification email sent successfully',
    //     ]);
    // }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt($request->only('email', 'password'))) {
    //         $user = Auth::user();
    //         $request->session()->regenerate();

    //         return response()->json([
    //             'message' => 'Login successful',
    //             'user' => $user,
    //         ]);
    //     }

    //     return response()->json([
    //         'message' => 'Invalid credentials'
    //     ], 401);
    // }

    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return response()->json([
    //         'message' => 'Logout successful'
    //     ]);
    // }
}
