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
Auth::routes();
Route::get('/' , 'SuperController@home');
Route::get('/a-z' , 'SuperController@az');
Route::get('/top' , 'SuperController@top');
Route::get('/software' , 'SuperController@software');
Route::get('/software/{id}' , 'SuperController@showSoftwares');
Route::get('/games' , 'SuperController@game');
Route::get('/news' , 'SuperController@news');
Route::get('/req' , 'SuperController@req')->middleware('auth');
Route::get('/video/{id}' , 'SuperController@show');
Route::get('/tv' , 'SuperController@tvIndex');
Route::get('/tv/{id}' , 'SuperController@tvShow');
Route::get('/err' , 'SuperController@err');
Route::get('/errr' , 'SuperController@errr');
Route::get('/home', 'HomeController@index');
Route::get('/profile', 'HomeController@profile');
Route::post('/email', 'EmailController@submit')->name('email');

// start with admin routes
Route::middleware('admin' , 'auth')->group(function(){
  Route::get('/admin', 'HomeController@admin');
  Route::resource('/admin/cat', 'CatController');
  Route::resource('/admin/pages', 'PagesController');
  Route::resource('/admin/video', 'VideoController');
  Route::resource('/admin/tv' , 'TvController');
  Route::resource('/admin/directors' , 'DirectorsController');
  Route::resource('/admin/actors' , 'ActorsController');
  Route::resource('/admin/writers' , 'WritersController');
  Route::resource('/admin/inbox' , 'InboxController');
  Route::resource('/admin/user' , 'UserController');
  Route::get('/admin/config' , 'ConfigController@config');
  Route::post('/admin/config/add' , 'ConfigController@add');
  Route::post('/admin/config' , 'ConfigController@info');
});

// categorys routes
Route::get('cat/{id}' ,'CatController@show');
// start with search route
Route::get('s' , 'SuperController@search');
Route::get('data' , 'SuperController@data');
// start with the paymint
Route::middleware('auth')->group(function(){
  Route::get('/plans' , 'SubscriptionsController@plans');
  Route::post('/charge' , 'SubscriptionsController@charge');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});
