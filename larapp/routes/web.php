<?php

use Illuminate\Support\Facades\Route;
use \Carbon\Carbon;
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

/*Route::get('helloworld', function () {
    return "<h1>Hello World</h1>";
});*/

/*Route::get('users', function () {
    dd(App\User::all());
});*/

/*Route::get('user/{id}', function ($id) {
    dd(App\User::findOrFail($id));
});*/

Route::get('challenge', function () {
    foreach (App\User::all()->take(10) as $user) {
        $years = Carbon::createFromDate($user->birthdate)->diff()->format('%y years old');
        $since = Carbon::parse($user->created_at);
    	$rs[]  = $user->fullname." - ".$years." - created ".$since->diffForHumans();
    }
    return view('challenge', ['rs' => $rs]);
});

/*Route::get('examples', function () {
    return view('examples');
});*/

Auth::routes();

// Resources
Route::resources([
    'users'         => 'UserController',
    'categories'  => 'CategoryController',
    'games'       => 'GameController',
]);

// Middleware
Route::get('locale/{locale}', 'LocaleController@index');

Route::get('/home', 'HomeController@index')->name('home');

// Exports PDF
Route::get('generate/pdf/users', 'UserController@pdf');

// Exports EXCEL
Route::get('generate/excel/users', 'UserController@excel');

// Import EXCEL
Route::post('import/excel/users', 'UserController@importExcel');