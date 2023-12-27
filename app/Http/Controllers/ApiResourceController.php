<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class ApiResourceController extends Controller
{
    public function users(Request $request)
    {
        // $users = User::first();
        // $users = User::with('orders')->get();
        $users = User::get();
        // return $users;
        // $users = User::all()->keyBy->email;
        // $users = User::all()->keyBy->name;
        // $users = User::all()->keyBy->id;
        // return UserCollection::make($users);
        // return UserResource::make($users);
        return UserResource::collection($users);
        // return 'wow';
    }
}
