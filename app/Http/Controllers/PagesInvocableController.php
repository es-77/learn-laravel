<?php

namespace App\Http\Controllers;


class PagesInvocableController extends Controller
{
    public function __invoke()
    {
        return "hello worl invokable";
    }
}
