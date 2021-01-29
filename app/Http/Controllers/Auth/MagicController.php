<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\MagicLink;
use App\Models\Magiclink as ModelsMagiclink;
use App\Models\User;
use App\Services\Auth\MagicAuthentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    }

    protected function validateForm(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users'],
        ]);
    }

    public function check(Request $request, $token)
    {
       
        $token_exsists = DB::table('magiclinks')->where('link', $token)->exists();
     
        $magic = ModelsMagiclink::where('link', $token)->first();

        $user = User::where('email', $request->input('email'))->first();

        if ($token_exsists && $magic->user_id == $user->id) {
            Auth::login($user);
            return redirect()->route('shop')->with('successMagicLogin', $user->name . 'عزیز با موفقیت لاگین شدید');
        }
    }
}
