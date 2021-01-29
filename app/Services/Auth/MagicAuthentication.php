<?php

namespace App\Services\Auth;

use App\Models\Magiclink;
use App\Models\User;
use Illuminate\Http\Request;

class MagicAuthentication
{
    

    public function buildLink(Request $request)
    {
        $token = \Str::random(60);
    
        $user = User::where('email', $request->email)->first();

        Magiclink::create([
            'user_id' => $user->id,
            'link' => $token,
        ]);
    }
}