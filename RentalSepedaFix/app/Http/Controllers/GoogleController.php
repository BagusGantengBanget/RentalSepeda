<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User;
use Client;
 
class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
 
    public function callback()
    {
 
        // jika user masih login lempar ke home
        if (Auth::check()) {
            return redirect('/home');
        }
 
        $oauthUser = Socialite::driver('google')->user();
        $user = User::where('google_id', $oauthUser->id)->first();
        if ($user) {
            Auth::loginUsingId($user->id);
            return redirect('/home');
        } else {
            $newUser = User::create([
                'name' => $oauthUser->name,
                'email' => $oauthUser->email,
                'google_id'=> $oauthUser->id,
                'password' => md5($oauthUser->token),
                /* 'username' => $oauthUser->username,
                'nik' => $oauthUser->nik,
                'gender' => $oauthUser->gender,
                'birthday' => $oauthUser->birthday,
                'phone' => $oauthUser->phone,
                'address' => $oauthUser->address, */
                // password tidak akan digunakan ;)
            ]);
            Auth::login($newUser);
            return redirect('/home');
        }
    }
}