<?php

use App\Http\Controllers\ApiResourceController;
use App\Http\Controllers\images\ImageBase64Controller;
use App\Http\Controllers\SendMessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/message', [SendMessageController::class, "messageSend"]);

Route::post('/upload', [ImageBase64Controller::class, 'handleImage']);

Route::get('/api-resource', [ApiResourceController::class, 'users']);
