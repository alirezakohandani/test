<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    /**
     * show login form
     *
     * @return void 
     */

    public function showLoginForm()
    {
        return view('auth.login');
       
    }

     /**
     * login logic
     *
     * 
     */

    public function login(Request $request) 
    {
       
       $this->validateForm($request);

      if (Auth::attempt($request->only('email', 'password'), true)) {
     
        return redirect()->intended();
        }

        
       return back()->with('message','اطلاعات اشتباه است.');
    
    }
     /**
     * login validation method
     *
     * 
     */
    protected function validateForm(Request $request)
    {
      
        $request->validate([
            'email' => ['required', 'email' , 'exists:users'],
            'password' => ['required']
        ]);
    }
    
   
    /**
     * logout
     * 
     * 
     * 
     */

    public function logout()
    {
        // session()->invalidate();

        Auth::logout();

        return redirect()->route('auth.login.form');
      
    }
}
