first route file web.php

    route check list

    php artisan route:list give all route including vendor route

    php artisan route:list --except-vendor

    php artisan route:list --path=post

    Route::get('/posts/{id?}/{name?}', function (Request $request, $id = null, $name = null) {
    return dd($request, $id, $name);
    })->whereNumber('id')->whereAlpha('name');

route chain methods id must be integer name must be string

```php
    whereNumber("id") integer
    whereAlpha("name") string
    whereAlphaNumberic("namenumber") integer and string
    whereIn('category'.['movie','song'])
    where('id','[@0-9]+')

```

| Property         | Description                                            |
| ---------------- | ------------------------------------------------------ |
| Sloop->index     | The index of the current loop iteration (starts at 0). |
| Sloop->iteration | The current loop iteration (starts at 1).              |
| Sloop->remaining | The iterations remaining in the loop.                  |
| Sloop->count     | The total number of items in the array being iterated. |
| Sloop->first     | Whether this is the first iteration through the loop.  |
| Sloop->last      | Whether this is the last iteration through the loop.   |
| Sloop->even      | Whether this is an even iteration through the loop.    |
| Sloop->odd       | Whether this is an odd iteration through the loop.     |
| Sloop->depth     | The nesting level of the current loop.                 |

```
php
foreach([1,2,3,4,5,6] as $num){
    print(Sloop->index);
    echo "<br>";
    print(Sloop->iteration);
    echo "<br>";
    print(Sloop->remaining);
    echo "<br>";
    print(Sloop->count);
    echo "<br>";
    print(Sloop->first);
    echo "<br>";
    print(Sloop-›last Whether);
    echo "<br>";
    print(Sloop-›even Whether);
    echo "<br>";
    print(Sloop->odd);
    echo "<br>";
    print(Sloop->depth);
    echo "<br>";

}

```

laravel blade file one view add another view

```php
@include('file_namne',$dataPass = "pass any data to this view");

@includeWhen("condition value true/false","view file name",$dataPass="pass any data")

@includeUnless("condition value true/false","view file name",$dataPass="pass any data")

```

make template inhertenance
make main page in any where you want
header footer sider bar
include them into main layout
file path
resources\views\template_inhertenances\main.blade.php
resources\views\template_inhertenances\footer.blade.php
resources\views\template_inhertenances\header.blade.php
resources\views\template_inhertenances\nav_bar.blade.php
resources\views\template_inhertenances\sidebar.blade.php
resources\views\template_inhertenances\dasbord.blade.php
resources\views\template_inhertenances\page1.blade.php
use sentext

```php
    @extends('template_inhertenances.main')
    @section('title')
        page 1
    @endsection

    @section('content')
        <p>page 1 blade file </p>
    @endsection


```
