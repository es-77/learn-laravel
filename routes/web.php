<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PagesInvocableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\OutlookController;

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

require __DIR__ . '/auth2_route.php';

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


// php variable use in script
Route::get('variable', function () {
    return view('php_varible_use_scripts.use_php_varible_script');
});
Route::get('variable', function () {
    $name = "Emmanuel saleem";
    return view(
        'pass_route_data.route_data_pass',
        [
            'user' => $name,
            'city' => 'pakistan'
        ]
    );
    // return view("pass_route_data.route_data_pass")
    //     ->with('user', $name)
    //     ->with('city', 'pakistan');
    // return view('pass_route_data.route_data_pass')
    //     ->withUser($name)
    //     ->withCity("pakistan");
});

// controller part 

Route::get('page_a', [PagesController::class, 'pageA']);
Route::get('page_b', [PagesController::class, 'pageB']);
Route::get('page_invok', PagesInvocableController::class);

// firbase real time database



Route::get('/redirectToMicrosoftLogin', [OutlookController::class, 'redirectToMicrosoftLogin'])->name('redirectToMicrosoftLogin');

Route::get('/auth/microsoft/callback', [OutlookController::class, 'handleMicrosoftLoginCallback']);

Route::get('/fetchReceipts', [OutlookController::class, 'fetchReceipts']);

Route::get('/get-firebase-data', [FirebaseController::class, 'index'])->name('firebase.index');