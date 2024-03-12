<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;

class FirebaseController extends Controller
{
    protected $firebase;
    protected $database;
    public function __construct()
    {
        $this->firebase = (new Factory)
            ->withServiceAccount(__DIR__ . '/laravel-firebase-demo-b0574-firebase-adminsdk-8edx0-20abe277bc.json')
            ->withDatabaseUri('https://laravel-firebase-demo-b0574-default-rtdb.firebaseio.com/');
        $this->database = $this->firebase->createDatabase();
    }
    public function index()
    {

        $blog = $this->database->getReference('blog');

        $database = $this->firebase->createDatabase();
        $outstanding_payment = $database
            ->getReference('outstanding_payment/' . 'limitDriver->unique_id_driver')->push([
                'phone'     => 'limitDriver->phone',
                'email'     => 'limitDriver->email',
                'name'      => 'limitDriver->fullname',
                'unique_id_driver'  => 'limitDriver->unique_id_driver',
                'total_outstanding_payment' => 'limitDriver->total_limit',
                'max_limit' => 'limit',
            ]);
        // $this->database
        //     ->getReference('run_time create/')
        //     ->push([
        //         'phone' => fake()->phoneNumber(),
        //         // Add other fields as needed
        //     ]);
        // $this->database
        //     ->getReference('my_new_run_time/')
        //     ->push([
        //         'phone' => fake()->phoneNumber(),
        //         // Add other fields as needed
        //     ]);
        // $this->database
        //     ->getReference('chats/' . 'group_name1')
        //     ->push([
        //         'phone' => fake()->phoneNumber(),
        //         // Add other fields as needed
        //     ]);
        // $this->database
        //     ->getReference('my_corrdinates/')
        //     ->push([
        //         'latitude' => fake()->latitude(),
        //         'longitude' => fake()->longitude(),
        //         // Add other fields as needed
        //     ]);
        // $this->database
        //     ->getReference('my_corrdinates/')
        //     ->uppdate([
        //         'latitude' => 'fake()->latitude()',
        //         'longitude' => 'fake()->longitude()',
        //         // Add other fields as needed
        //     ]);


        $assigned_order = $this->database
            ->getReference('assigned_order/' . 'nearestDriver->driver->unique_id_driver')->push([
                'order_number'    => 'order_number',
                'driver_name'     => 'nearestDriver->driver->fullname',
                'lat_pickup'      => 'request->lat_pickup',
                'long_pickup'     => 'request->long_pickup',
                'lat_destination' => 'request->lat_destination',
                'long_destination' => 'request->long_destination',
                'status'          => 'not_selected',
                'payment_method'  => 'request->payment_method',
                'price'           => 'price',
                'percent_for_mn'  => 'percentage',
                'distance'        => 'meters',
                'trans_order_id'  => 'trans->id',
                'driver_id'       => 'nearestDriver->driver->unique_id_driver',
                'vehicle_number_plate'  => 'nearestDriver->driver->vehicle_number_plate',
                'customer_id'     => random_int(1, 100),
                'customer_name'   => 'trans->customer->fullname',
                'location_pickup_name' => 'request->location_pickup_name',
                'location_destination_name' => 'request->location_destination_name',
                'notes' => 'request->notes',
            ]);

        echo '<pre>';
        print_r($blog->getvalue());
        echo '</pre>';
    }
}