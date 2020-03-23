<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->stateless()->user();
        $user = $this->findOfCreate($getInfo);
        Auth::login($user);
        return redirect()->to('/home');
    }
    public function findOfCreate($getInfo) {
        $user = User::where('email', $getInfo->email)->first();
        if (!$user)
        {
            $user = User::create([
                'name' => $getInfo->name,
                'password' => Hash::make($getInfo->id),
                'email' => $getInfo->email,
                'role' => 2,
            ]);
        }
        return $user;
    }
}
