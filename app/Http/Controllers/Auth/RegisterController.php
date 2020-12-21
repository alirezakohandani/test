<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Mail\SendEmailVerification;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

   // use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'cellphone' => $data['cellphone'],
            'tokenId' => $data['_token'],
        ]);
        
    }
    
    /**
     * show register Form
     * 
     * 
     * @return void
     */

     public function showRegisterForm()
     {
         return view('auth.register');
     }

     /**
      * register and send Email
      *
      * 
      * @return void
      */
     public function register(Request $request)
     {
       

       
        $user = $this->create($request->all());
       
        Mail::to($request->email)->send(new SendEmailVerification($user, $user->tokenId));

        Auth::login($user);

        return redirect()->route('home')->with('registred', true);

       
     }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     protected function validateForm(Request $request)
     {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'cellphone' => ['numeric', 'digits:3', 'nullable']
        
        ]);
     }
     
     /**
      * logout system
      *
      *
      *@return void
      */

     public function logout(Request $request)
     {  
       
        Auth::logout($request->id);
        return redirect()->route('auth.login');
     }
}
