<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        $emails = Email::all();
        return view('emails', compact('emails'));
    }

    public function store(Request $request)
    {
        $email = $request->only('email');
        Email::create($email);

        session()->flash('msgsent', @trans('validation.custom.message_sent'));

        return view('rootkit');
    }

}
