<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $user     = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended(route('user.dashboard'));
            } else {
                $newUser = User::create([
                    'name'      => $user->name,
                    'email'     => $user->email,
                    'google_id' => $user->id,
                    'password'  => Hash::make($user->name . '@' . $user->id),
                    'avatar'    => $user->avatar_original,
                ]);

                $newUser->assignRole('user');

                Auth::login($newUser);

                return redirect()->intended(route('user.dashboard'));
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
