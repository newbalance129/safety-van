<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();
Route::get('logout', function() {
	Auth::logout();
	return Redirect::to('/');
})->middleware('auth');

Route::get('/', function () {
	return Redirect::to('/tables');
})->middleware('auth');

Route::get('/tables', 'AdminController@driverShow')->middleware('auth');

Route::get('/ViewPassenger', 'AdminController@roundpassShow')->middleware('auth');

Route::get('/ViewRoundPass', 'AdminController@passengerShow')->middleware('auth');

Route::get('/blank-page', 'AdminController@driverShow1')->middleware('auth');

Route::get('/edit/{driverID}', 'AdminController@dit')->middleware('auth');
Route::get('/edit','AdminController@edit')->middleware('auth');
Route::post('/edit', 'AdminController@driverEdit')->middleware('auth');

Route::get('/report', 'AdminController@reportForm');
Route::get('/report/{value}', 'AdminController@reportForm');

Route::get('/forms', 'AdminController@driverAdd')->middleware('auth');
Route::post('/forms', 'AdminController@driverAdd')->middleware('auth');

Route::get('/delete/{driverID}', 'AdminController@deleteDriver')->middleware('auth');
Route::get('/delete','AdminController@deleteDriver')->middleware('auth');

Route::get('/update','AdminController@update')->middleware('auth');

Route::get('/search','AdminController@searches')->middleware('auth');

Route::get('/ViewReport', 'AdminController@reportShow')->middleware('auth');

Route::get('/mm', 'AdminController@a');

Route::post('/submitreport', 'AdminController@reportAdd');

Route::get('/problem/{reportId}', 'AdminController@problem')->middleware('auth');

Route::get('/home', 'HomeController@index');

Route::get('/way', 'AdminController@routeShow')->middleware('auth');

Route::get('sample', function()
{
	return View::make('sample');
});;

Route::get('reportvan','AdminController@person')->middleware('auth');

Route::get('showreport','AdminController@reportvan')->middleware('auth');

Route::get('chartreport','AdminController@chartreport')->middleware('auth');

Route::get('/map', function()
{
	return View::make('map');
});;

Route::get('bootstrap-elements', function()
{
	return View::make('bootstrap-elements');
});

Route::get('charts', function()
{
	return View::make('charts');
});;

Route::get('bootstrap-grid', function()
{
	return View::make('bootstrap-grid');
});;


Route::get('index', function()
{
	return View::make('index');
});;

Route::get('report', function()
{
	return View::make('report');
});;






