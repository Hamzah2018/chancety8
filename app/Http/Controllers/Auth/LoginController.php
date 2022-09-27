<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Traits\AuthTrait;

class LoginController extends Controller
{


    // use AuthenticatesUsers;
       use AuthTrait;
       public function __construct()
       {
           $this->middleware('guest')->except('logout');
       }

    public function loginForm($type){
        return view('auth.login',compact('type'));
    }

        public function login(Request $request){
        if(Auth::guard($this->checkGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])){
            return  $this->redirect($request);
        }
            }

            public function logout(Request $request,$type)
            {
               Auth::guard($type)->logout();
               $request->session()->invalidate();
               $request->session()->regenerateToken();
               return redirect('/');
            }


}
