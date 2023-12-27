<?php

namespace App\Http\Controllers;

use App\Events\MyEvent;
use Illuminate\Http\Request;

class SendMessageController extends Controller
{
    public function messageSend(Request $request)
    {
        event(new MyEvent('hello world'));
        return json_encode("message send");
        dd($request->all());
    }
}
