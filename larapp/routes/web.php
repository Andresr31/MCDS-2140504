<?php

use Illuminate\Support\Facades\Route;

use Carbon\Carbon;

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

Route::get('saludo', function () {
    dd("Hola mundo");
});

Route::get('users', function () {

    /// Considero que esto debería estar en un controlador, sin embargo,
    /// por efectos practicos del ejefcicio propuesto, lo haré acá

    $users = App\User::all()->take(10);

    /// Forma de hacerlo solo con php
    // foreach($users as $user){
    //     $user->age = date_diff(date_create($user->birthdate), date_create(now()))->format('%y');

    //     $yearDiff = strftime("%Y", now()->getTimestamp()) - strftime("%Y", $user->created_at->getTimestamp());
    //     $monthDiff = strftime("%m", now()->getTimestamp()) - strftime("%m", $user->created_at->getTimestamp());
    //     $weekDiff = strftime("%W", now()->getTimestamp()) - strftime("%W", $user->created_at->getTimestamp());
    //     $dayDiff = strftime("%j", now()->getTimestamp())-strftime("%j", $user->created_at->getTimestamp());

    //     $created = (($yearDiff >0) ? $yearDiff.' años ':'' ).
    //                 (($monthDiff >0 && $monthDiff<12) ? $monthDiff.' meses ':'') .
    //                 (($weekDiff >0 && $weekDiff <30 ) ? $weekDiff.' semanas ':'') .
    //                 (($dayDiff >0 && $dayDiff < 7 ) ? $dayDiff.' dias ':'' );


    //     $user->created = $created;
    // }

        // Forma de hacerlo con el framework
    foreach (App\User::all()->take(10) as $user) {

        $years = Carbon::createFromDate($user->birthdate)->diff()->format('%y years old');
        $since = Carbon::parse($user->created_at);
        $rs[] = $user->fullname." - ".$years." - created ".$since->diffForHumans();

        }

        dd($rs);

    return view('users',['users'=>$users]);
});

Route::get('users/{id}', function ($id) {
    dd(App\User::find($id));
});
