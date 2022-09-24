<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Support\Facades\Auth;


// class CustomerLoginController extends Controller
// {
//     //
//     use AuthenticatesUsers;
//     //
//     protected $redirectTo = "customer/dashboard";
//     public function __construct()
//     {
//         $this->middleware('guest:customer,customer/dashboard')->except('logout');
//     }
//     public function showLoginForm()
//     {
//         return view('auth.customer.login');
//     }
//     protected function guard()
//     {
//         return Auth::guard("customer");
//         // return \Auth::guard();
//     }
// }
