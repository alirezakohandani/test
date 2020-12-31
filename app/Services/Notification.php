<?php

namespace App\Services;

use App\Mail\WellcomeMail;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Notification extends Mailable
{
    /**
     * send wellcome email
     * 
     * 
     */

    public function SendEmail()
    {  
       return Mail::to(Auth::user()->email)->send(new WellcomeMail);
    }
}