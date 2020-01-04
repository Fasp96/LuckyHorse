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
//Auth routes
Auth::routes();

//Main page routes
Route::get('/', 'WelcomeController@index');
Route::get('/', 'WelcomeController@index')->name('home');

//Admin options route
Route::get('/manage', 'ManageController@index');

//Add horses routes
Route::get('/add_horses', 'AddHorsesController@index');
Route::post('/add_horses', 'AddHorsesController@add');

//Add jockeys routes
Route::get('/add_jockeys', 'AddJockeysController@index');
Route::post('/add_jockeys', 'AddJockeysController@add');

//Add tournaments routes
Route::get('/add_tournaments', 'AddTournamentsController@index');
Route::post('/add_tournaments', 'AddTournamentsController@add');
Route::get('/api/add_tournaments', 'AddTournamentsController@getRaces');

//Add races routes
Route::get('/add_races', 'AddRacesController@index');
Route::post('/add_races', 'AddRacesController@add');
Route::get('/api/add_races', 'AddRacesController@getJockeysHorses');
Route::get('/api/add_races_tournaments', 'AddRacesController@getTournaments');

//Add news routes
Route::get('/add_news', 'AddNewsController@index');
Route::post('/add_news', 'AddNewsController@add');

//Users and their information routes
Route::get('/users','UsersController@index');
Route::get('/users_page={page_number}', 'UsersController@index');
Route::get('/users/{id}','UsersController@getUser');
//User add funds route
Route::post('/users/{id}','UsersController@addBalance');

//News and their information routes
Route::get('/news', 'NewsController@index');
Route::get('/news_page={page_number}', 'NewsController@index');
Route::get('/news/{id}', 'NewsController@getNews');

//Tournaments and their information routes
Route::get('/tournaments', 'TournamentsController@index');
Route::get('/tournaments_page={page_number}', 'TournamentsController@index');
Route::get('/tournaments/{id}', 'TournamentsController@getTournament');

//Races and their information routes
Route::get('/races', 'RacesController@index');
Route::get('/races_page={page_number}', 'RacesController@index');
Route::get('/races/{id}', 'RacesController@getRace');

//Horses and their information routes
Route::get('/horses', 'HorsesController@index');
Route::get('/horses_page={page_number}', 'HorsesController@index');
Route::get('/horses/{id}', 'HorsesController@getHorse');

//Jockeys and their information routes
Route::get('/jockeys', 'JockeysController@index');
Route::get('/jockeys_page={page_number}', 'JockeysController@index');
Route::get('/jockeys/{id}', 'JockeysController@getJockey');

//Bets routes
Route::get('/bets', 'BetsController@index');
Route::get('/bets_page={page_number}', 'BetsController@index');

//Add race bet routes
Route::get('/add_bet_race={id}', 'AddBetsController@index_bet_race');
Route::post('/add_bet_race={id}', 'AddBetsController@add_bet_race');

//Add tournament bet routes
Route::get('/add_bet_tournament={id}', 'AddBetsController@index_bet_tournament');
Route::post('/add_bet_tournament={id}', 'AddBetsController@add_bet_tournament');

//Edit tournament routes
Route::get('/edit_tournament={id}', 'EditTournamentsController@editTournament');
Route::post('/edit_tournament={id}', 'EditTournamentsController@updateTournament');
Route::get('/api/edit_tournament={id}', 'EditTournamentsController@getTournament');
Route::get('/api/add_tournaments={id}', 'EditTournamentsController@getRaces');

//Edit race routes
Route::get('/edit_race={id}', 'EditRacesController@editRace');
Route::post('/edit_race={id}', 'EditRacesController@updateRace');
Route::get('/api/edit_race={id}', 'EditRacesController@getRace');
Route::get('/api/add_races_tournaments={id}', 'EditRacesController@getTournaments');

//Edit jockey routes
Route::get('/edit_jockey={id}', 'EditJockeysController@editJockey');
Route::get('/api/edit_jockey={id}', 'EditJockeysController@getJockey');
Route::post('/edit_jockey={id}', 'EditJockeysController@updateJockey');

//Edit horse routes
Route::get('/edit_horse={id}', 'EditHorsesController@editHorse');
Route::get('/api/edit_horse={id}', 'EditHorsesController@getHorse');
Route::post('/edit_horse={id}', 'EditHorsesController@updateHorse');

//Edit news routes
Route::get('/edit_news={id}', 'EditNewsController@editNews');
Route::get('/api/edit_news={id}', 'EditNewsController@getNews');
Route::post('/edit_news={id}', 'EditNewsController@updateNews');

//Edit user routes
Route::get('/edit_user={id}', 'EditUserController@editUser');
Route::get('/api/edit_user={id}', 'EditUserController@getUser');
Route::post('/edit_user={id}', 'EditUserController@updateUser');

//Edit result routes
Route::get('/edit_results={id}', 'EditResultsController@editResult');
Route::post('/edit_results={id}', 'EditResultsController@updateResult');

//Claim bet prize route
Route::get('/claim={id}', 'BetsController@claim_bet');
