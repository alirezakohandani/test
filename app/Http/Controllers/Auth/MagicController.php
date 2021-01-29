<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\MagicAuthentication;
use Illuminate\Http\Request;

class MagicController extends Controller
{
    public function show()
    {
        return view('auth.magic');
    }

    public function login(Request $request, MagicAuthentication $magic)
    {
        
        $this->validateForm($request);

        $magic->buildLink($request);

        //send link

        //check link

        //login
    }

    protected function validateForm(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users'],
        ]);
    }
}
