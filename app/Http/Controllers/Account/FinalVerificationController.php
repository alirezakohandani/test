<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class FinalVerificationController extends Controller
{
    /**
     * verify user email
     *
     * 
     * @return void
     */
    public function verify($token)
    {
        $email_verified_at = DB::table('users')->select('email_verified_at')->where('tokenId', '=', $token)->get();
        
        if ($email_verified_at[0]->email_verified_at == null) 
        {
            DB::table('users')->where('tokenId', '=' ,$token)->update([
                'email_verified_at' => now(),
            ]);
        }

      return redirect()->route('home')->with('verified', true);
    }
}
