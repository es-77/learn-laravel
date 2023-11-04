<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function pageA()
    {
        return view('controllers_view.AController');
    }
    public function pageB()
    {
        return view('controllers_view.BController');
    }
}
