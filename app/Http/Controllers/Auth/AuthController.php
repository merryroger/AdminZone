<?php

namespace App\Http\Controllers\Auth;

use AuthenticatesUsers;

class AuthController extends LoginController
{
    //protected $redirectTo = '';

    protected function redirectTo()
    {
        return route('emails');
    }

    public function username()
    {
        return 'name';
    }

    public function index()
    {
        return view('rootkit');
    }
}
