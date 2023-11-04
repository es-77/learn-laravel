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
//     return view('anchors.anchor_tag');
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
// Route::get('/posts/{id?}/{name?}', function (Request $request, $id = null, $name = null) {
//     return dd($request, $id, $name);
// })->whereNumber('id')->whereAlpha('name');

// route name 

// Route::get('/anchors/page', function () {
//     return view('anchors.anchor_tag');
// })->name('anchor');
// Route::get('/anchors/another/page', function () {
//     return view('anchors.another_anchor_page');
// })->name('another_anchor');

// route group 
// Route::prefix('anchors')->group(function () {
//     Route::get('/page', function () {
//         return view('anchors.anchor_tag');
//     })->name('anchor');
//     Route::get('/another/page', function () {
//         return view('anchors.another_anchor_page');
//     })->name('another_anchor');
// });
// route redirect
// Route::redirect('anchor_page_redirct', '/anchors/page', 302);

// Route::get('blade', function () {
//     return view('blades.basic');
// });
// Route::prefix('blade_template_main')->group(function () {
//     Route::get('/a', function () {
//         return view('blade_template_main.a');
//     });
//     Route::get('/b', function () {
//         return view('blade_template_main.b');
//     });
// });

// template inhertenance 
Route::prefix('template_inhertenances')->group(function () {
    Route::get('/page1', function () {
        return view('template_inhertenances.page1');
    });
    Route::get('/page2', function () {
        return view('template_inhertenances.page2');
    });
    Route::get('/dasbord', function () {
        return view('template_inhertenances.dasbord');
    });
    Route::get('/main', function () {
        return view('template_inhertenances.main');
    });
});
