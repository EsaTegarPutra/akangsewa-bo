<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;
use Artisan;
use Auth;
use App\User;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(){
        return view('auth.login');
    }
    public function postLogin(Request $r){

        $email = $r->input('username');
        $password = $r->input('password');
        $remember = ($r->input('remember')) ? true : false;

        $checkUser = User::where('email', $email)->where('role_id','1')->count();
        if($checkUser < 1){
          $alert = "Account not found";
        }else{
          if (Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect(url('dashboard'));
          }else{
            $alert = "Mohon periksa username dan password anda";
          }
        }

        Session::flash('info', 'Error');
        Session::flash('colors', 'red');
        Session::flash('icons', 'fas fa-times');
        Session::flash('alert', $alert);
        return redirect()->back();

    }
}
