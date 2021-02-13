<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Jobs\SendEmail1;
use App\Mail\EmailVerification;
use App\Mail\SendEmailVerification;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function send(Request $request)
    {
        if ($request->user()->email_verified_at == null)
        {
            $user = $request->user();
            $token = $request->user()->tokenId;
            SendEmail::dispatch($user);
            return redirect()->route('home')->with('email-verified', 'ایمیل تایید شد');
            
        }

        return redirect()->route('home');
       
        //  return redirect()->back();
    }

    public function verify(string $token)
    {
        dd($token);
    }
}
