<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use AuthenticatesUsers;
use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends LoginController
{
    protected $redirectTo = '/emails';

    public function username()
    {
        return 'name';
    }

    public function index() {
        return view('root');
    }
}
