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

content file code

```php
    @extends('template_inhertenances.main')
    @section('title')
        page 1
    @endsection

    @section('content')
        <p>page 1 blade file </p>
    @endsection

    @push('script')
        <script>
            alert(123);
        </script>
    @endpush

```

main file code

```
php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title','emmanuel')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    @include('template_inhertenances.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('template_inhertenances.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('template_inhertenances.footer')
    <!-- End Footer -->
    @stack('script)

</body>

</html>


```

use php variable into javascript

```
php
@php
    $name = 'Emmanuel saleem';
    $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];
@endphp

@verbatim
    {{hello world $variable}}
@endverbatim


<p> open console and see $name = 'Emmanuel saleem'; <br>
    $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9]; </p>
<script>
    var dataName = @json($name);
    var dataNumber = @json($numbers);
    var newWay = {{ Js::from($numbers) }};
    console.log("name print here", dataName);
    console.log("number print here", dataNumber);
    console.log("another way ", newWay);
</script>

```

pass route data into variable

```php

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


```

controller

```php
Route::get('page_a', [PagesController::class, 'pageA']);
Route::get('page_b', [PagesController::class, 'pageB']);
Route::get('page_invok', PagesInvocableController::class);

// it create simple controller no method
php artisan make:controller PagesController
// it create the invok controller
php artisan make:controller PagesInvokController -i
//create api controller its also create method only api method
php artisan make:controller ApiController --api
// create controller with there method index show udpate store destory
php artisan make:controller ResourceController --resource


```

// create migration

    | Key | Value |
    |---|---|
    | NOT NULL | $table-›string('email')->nullable(); |
    | UNIQUE | $table->string('email')->unique(); or $table-›unique('email'); |
    | DEFAULT | $table->string('city')->default('Agra'); |
    | PRIMARY KEY | Stable-›primary('user_id'); |
    | FOREIGN KEY | Stable->foreign(user id'->references(id')->on('users'); |

// another

| Modifier                | Description                                                                |
| ----------------------- | -------------------------------------------------------------------------- |
| ->after('column')       | Place the column "after" another column (MySQL).                           |
| ->autolncrement()       | Set INTEGER columns as auto-incrementing (primary key).                    |
| ->comment('my comment') | Add a comment to a column (MySQL/PostgreSQL).                              |
| ->first()               | Place the column "first" in the table (MySQL).                             |
| ->from($integer)        | Set the starting value of an auto-incrementing field (MySQL / PostgreSQL). |
| ->invisible()           | Make the column "invisible to SELECT \* queries (MySQL)".                  |
| ->unsigned()            | Set INTEGER columns as UNSIGNED (MySQL).                                   |
| ->useCurrent()          | Set TIMESTAMP columns to use CURRENT_TIMESTAMP as default value            |
| ->useCurrentOnUpdate()  | Set TIMESTAMP columns to use CURRENT_TIMESTAMP when a record is updated    |

```php
    //it create the table with tests name
    php artisan make:migration create_tests_table
    //run migrations
    php artisan migration
    //roll back last migration
    php artisan migration:rollback
    //roll back  migration give how much
    php artisan migration:rollback --step=5
    //migration status how much migration run pending
    php artisan migration:status
    //migration reset
    php artisan migration:reset
    //migration and seed run
    php artisan migration --seed
    //migration refresh
    php artisan migration:refresh
    or
    php artisan migration:refresh --seed
    //migration fresh
    php artisan migration:fresh
    or
    php artisan migration:fresh --seed

    //update exist table
    php artisan migration:update_test_table --table=tests

    $table->renameColumn('from', 'to');
    //not work in
    //MySQL < 8.0.3
    //MariaDB < 10.5.2

    $table-›dropColumn('city');
    $table-›dropColumn(['city', 'avatar', 'location']);
    $table->string('name', 50)->change();
    $table-integer('votes')-unsigned()->default(1)->comment("my comment")

    Change Column Order

    $table->after('password', function (Blueprint Stable) {
    $table->string('address');
    $table->string('city');
    });

    $table->drop ('users');
    Schema::droplfExists("users");
    if (Schema::hasTable('users')) {
    // The "users" table exists…
    };
    if (Schema::hasColumn('users', 'email')) {
    // The "users" table exists and has an "email" column...
    };


example

Schema::table('users', function (Blueprint $table) {
    // Add a new column after the 'email' column.
    $table->string('phone')->after('email');

    // Make the 'id' column auto-incrementing.
    $table->integer('id')->autoIncrement();

    // Add a comment to the 'name' column.
    $table->string('name')->comment('The user\'s name');

    // Place the 'created_at' column first in the table.
    $table->timestamp('created_at')->first();

    // Set the starting value of the 'id' column to 100.
    $table->integer('id')->from(100);

    // Make the 'age' column invisible to SELECT * queries.
    $table->integer('age')->invisible();

    // Make the 'price' column unsigned.
    $table->integer('price')->unsigned();

    // Set the 'created_at' and 'updated_at' columns to use CURRENT_TIMESTAMP as default value.
    $table->timestamps()->useCurrent();

    // Set the 'updated_at' column to use CURRENT_TIMESTAMP when a record is updated.
    $table->timestamp('updated_at')->useCurrentOnUpdate();
});






    short hand
    // it will create model migration controller request factory seeder resource
    php artisan model:test -mrcRFS
    or
    // some extra polices etc
    php artisan model:test -all



```
