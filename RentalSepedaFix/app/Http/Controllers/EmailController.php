<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;

class EmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function mail()
    {
        $email_order =  DB::table('users')
       ->select('id', 'email')
       ->where('id', '=', $id)
       ->first();
 
       Mail::send('emails.myDemoMail', ['number' => $email_order->id], function ($m) use ($email_order) {
        $m->from('rentalbagus14@gmail.com', 'Rental Bagus');
 
        $m->to($email_order->email)->subject('Your number order is '.$email_order->id);
    });
    
    }
}








/* $user = User::find(1);
$email = array('email' => User::get('email'));
Mail::send('email', 'user', function($message) use ($user) {
    $message->to($user->email);
    $message->subject('Email dari rentalbagus14@gmail.com');
});
dd('Mail Send Successfully'); */