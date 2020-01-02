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

/*
use App\Race;
use App\Tournament;

Route::get('/', function () {
    $races = Race::where('date', '>', DB::raw('CURDATE()'))->orderByDesc('date')->get();
    $last_races = Race::orderByDesc('date')->take(3)->get();
    $tournaments = Tournament::where('date', '>', DB::raw('CURDATE()'))->orderByDesc('date')->get();
    return view('welcome',compact('races','last_races','tournaments'));
});
*/

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

Route::get('/', 'WelcomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/manage', 'ManageController@index');

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
Route::get('/api/add_races_tournaments', 'AddRacesController@getTournaments');

Route::get('/add_news', 'AddNewsController@index');
Route::post('/add_news', 'AddNewsController@add');

Route::get('/users','UsersController@index');
Route::get('/users_page={page_number}', 'UsersController@index');
Route::get('/users/{id}','UsersController@getUser');

Route::get('/news', 'NewsController@index');
Route::get('/news_page={page_number}', 'NewsController@index');
Route::get('/news/{id}', 'NewsController@getNews');

Route::get('/tournaments', 'TournamentsController@index');
Route::get('/tournaments_page={page_number}', 'TournamentsController@index');
Route::get('/tournaments/{id}', 'TournamentsController@getTournament');

Route::get('/races', 'RacesController@index');
Route::get('/races_page={page_number}', 'RacesController@index');
Route::get('/races/{id}', 'RacesController@getRace');

Route::get('/horses', 'HorsesController@index');
Route::get('/horses_page={page_number}', 'HorsesController@index');
Route::get('/horses/{id}', 'HorsesController@getHorse');

Route::get('/jockeys', 'JockeysController@index');
Route::get('/jockeys_page={page_number}', 'JockeysController@index');
Route::get('/jockeys/{id}', 'JockeysController@getJockey');

Route::get('/bets', 'BetsController@index');
Route::get('/bets_page={page_number}', 'BetsController@index');

Route::get('/add_bet_race={id}', 'AddBetsController@index_bet_race');
Route::post('/add_bet_race={id}', 'AddBetsController@add_bet_race');

Route::get('/add_bet_tournament={id}', 'AddBetsController@index_bet_tournament');
Route::post('/add_bet_tournament={id}', 'AddBetsController@add_bet_tournament');


Route::get('/edit_tournament={id}', 'EditTournamentsController@editTournament');
Route::post('/edit_tournament={id}', 'EditTournamentsController@updateTournament');
Route::get('/api/edit_tournament={id}', 'EditTournamentsController@getTournament');
Route::get('/api/add_tournaments={id}', 'EditTournamentsController@getRaces');

Route::get('/edit_race={id}', "EditRacesController@editRace");
Route::post('/edit_race={id}', "EditRacesController@updateRace");
Route::get('/api/edit_race={id}', "EditRacesController@getRace");
Route::get('/api/add_races_tournaments={id}', "EditRacesController@getTournaments");