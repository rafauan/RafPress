<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\Verified;

class VerifyEmailController
{
    public function __invoke(EmailVerificationRequest $request)
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return redirect('/email/already-verified');
        }

        $user->markEmailAsVerified();
        $user->is_active = true;
        $user->save();

        event(new Verified($user));

        return redirect('/email/verified');
    }
}
