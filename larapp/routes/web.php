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

Route::get('/', 'HomeController@welcome');

// Dashboard Customer
Route::put('customer/{id}', 'UserController@customerupd');
// Dashboard Editor
Route::get('editor/info', 'UserController@editorinfo');
Route::get('editor/games', 'GameController@editorgames');

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

// Group Middleware
Route::group(['middleware' => 'admin'], function() {
    // Resources
    Route::resources([
        'users'       => 'UserController',
        'categories'  => 'CategoryController',
        'games'       => 'GameController',
    ]);
});

// Export PDF
Route::get('generate/pdf/users', 'UserController@pdf');
Route::get('generate/pdf/games', 'GameController@pdf');
Route::get('generate/pdf/categories', 'CategoryController@pdf');
// Export Excel
Route::get('generate/excel/users', 'UserController@excel');
Route::get('generate/excel/games', 'GameController@excel');
Route::get('generate/excel/categories', 'CategoryController@excel');
// Import Excel
Route::post('import/excel/users', 'UserController@import');
Route::post('import/excel/games', 'GameController@import');
Route::post('import/excel/categories', 'CategoryController@import');
// Search Scope
Route::post('users/search', 'UserController@search');
Route::post('categories/search', 'CategoryController@search');
Route::post('games/search', 'GameController@search');

// Middleware
Route::get('locale/{locale}', 'LocaleController@index');

Route::get('/home', 'HomeController@index')->name('home');

// Filter
Route::post('category/filter', 'HomeController@filter');
