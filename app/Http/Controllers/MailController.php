<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Use Dependencies
use Auth;
use Mail;
use DB;

//Use Models
use App\Mail\NewUserWelcome;
use App\User;
use App\Post;


class MailController extends Controller
{
    /**
     * Send email to New User
     * @return mail
     * 
     */
    public function email(){
        $data= DB::table('posts')
                    ->where('id', '8')
                    ->first();
        
        Mail::to(Auth()->user()->email)->send(new NewUserWelcome($data));
        return redirect('/dashboard')->with('success', 'Mail Sent');
    }
}
