<?php

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
use App\Race;
use App\Tournament;

Route::get('/', function () {
    $races = Race::where('date', '>', DB::raw('CURDATE()'))->orderByDesc('date')->get();
    $tournaments = Tournament::where('date', '>', DB::raw('CURDATE()'))->orderByDesc('date')->get();
    return view('welcome',compact('races','tournaments'));
});

/*
// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add_horses', 'AddHorsesController@index');
Route::post('/add_horses', 'AddHorsesController@add');

Route::get('/add_jockeys', 'AddJockeysController@index');
Route::post('/add_jockeys', 'AddJockeysController@add');

Route::get('/add_tournaments', 'AddTournamentsController@index');
Route::post('/add_tournaments', 'AddTournamentsController@add');
Route::get('/api/add_tournaments', 'AddTournamentsController@getRaces');

Route::get('/add_races', 'AddRacesController@index');
Route::post('/add_races', 'AddRacesController@add');
Route::get('/api/add_races', 'AddRacesController@getJockeysHorses');

Route::get('/tournaments', 'TournamentsController@index');

Route::get('/races', 'RacesController@index');

Route::get('/horses', 'HorsesController@index');

Route::get('/jockeys', 'JockeysController@index');
