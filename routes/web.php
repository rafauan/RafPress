<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\User;
// use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect('/admin');
});


Route::get('/email/verify/{id}/{hash}', function ($id, $hash) {
    $user = User::findOrFail($id);

    if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
        abort(403);
    }

    if (!$user->hasVerifiedEmail()) {
        $user->markEmailAsVerified();
        $user->is_active = true;
        $user->save();
    }

    return view('email-verified');
})->middleware('signed')->name('verification.verify');
