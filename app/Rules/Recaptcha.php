<?php

namespace App\Rules;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\ValidationRule;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $g_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $value,
            'remoteip' => \request()->ip()
        ]);

        if (!$g_response->json('success')) {
            $fail("The {$attribute} is invalid.");

            User::where('email', \request()->email)
                ->where('role_id', 2)
                ->increment('login_failed_attempts');

            $userBlocked = User::where('email', \request()->email)
                                ->where('role_id', 2)
                                ->where('login_failed_attempts', 3)
                                ->orWhere('login_failed_attempts', 6)
                                ->first();

            if(isset($userBlocked)) {
                $userBlocked->update([
                    'is_blocked' => 1
                ]);
            }

        }

    }
}
