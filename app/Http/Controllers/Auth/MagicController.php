<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\MagicLink;
use App\Services\Auth\MagicAuthentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MagicController extends Controller
{
    public function show()
    {
        return view('auth.magic');
    }

    public function login(Request $request, MagicAuthentication $magic)
    {
        
        $this->validateForm($request);

        $info = $magic->buildLink($request);

        Mail::to($request->email)->send(new MagicLink($info['user']['email'], $info['token']));

        //check link

        //login
    }

    protected function validateForm(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users'],
        ]);
    }

    public function check()
    {
        dd('check');
    }
}
