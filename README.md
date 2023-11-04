first route file web.php

    route check list

    php artisan route:list give all route including vendor route

    php artisan route:list --except-vendor

    php artisan route:list --path=post

    Route::get('/posts/{id?}/{name?}', function (Request $request, $id = null, $name = null) {
    return dd($request, $id, $name);
    })->whereNumber('id')->whereAlpha('name');

    whereNumber("id") integer
    whereAlpha("name") string
    whereAlphaNumberic("namenumber") integer and string
    whereIn('category'.['movie','song'])
    where('id','[@0-9]+')

route chain methods id must be integer name must be string
