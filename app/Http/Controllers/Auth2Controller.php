<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Auth2Controller extends Controller
{
    public function authLoginForm(Request $request)
    {
        return view('auth2.auth_form');
    }
    public function authLoginFormSubmit(Request $request)
    {
        dd($request->all());
    }
    public function handleCallCack(Request $request)
    {
        dd($request->all());
    }
}