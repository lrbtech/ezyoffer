<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use App\Models\language;
use Auth;

class SocialLoginController extends Controller
{

    public function socialLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallback($social)
    {
        $userSocial = Socialite::driver($social)->user();
        $user = User::where(['email' => $userSocial->getEmail()])->first();
        if($user){
            Auth::login($user);
            return redirect('/customer/dashboard');
        }
        //  else{
        //      return view('auth.register',['name' => $userSocial->getName(), 'email' => $userSocial->getEmail()]);
        //  }
    }

}
