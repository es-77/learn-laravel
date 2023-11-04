<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::view('/welcome', 'welcome', $passData = "data");
// Route::get('/anchor_tag', function () {
//     return view('anchor_tag');
// });
// Route::post('/post', function (Request $request) {
//     return dd($request);
// });

// route parameters 
// Route::get('/post/{id}', function (Request $request, $id) {
//     return dd($request, $id);
// });
// optional parameters and give default value
// Route::get('/posts/{id?}', function (Request $request, $id = null) {
//     return dd($request, $id);
// });

// multiples optional parameters and give default value
// Route::get('/posts/{id?}/{name?}', function (Request $request, $id = null, $name = null) {
//     return dd($request, $id, $name);
// });
// route contstrains 
Route::get('/posts/{id?}/{name?}', function (Request $request, $id = null, $name = null) {
    return dd($request, $id, $name);
})->whereNumber('id')->whereAlpha('name');
