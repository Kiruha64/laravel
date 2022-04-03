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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/','Admin\AdminController@admin')->name('admin');
    Route::resource('article', Admin\ArticlesController::class);
    Route::resource('teams', Admin\TeamsController::class);
    Route::get('/teams/{id}/members/','Admin\TeamsController@members')->name('teams.members');
    Route::get('/teams/{id}/addmember','Admin\TeamsController@addmember')->name('teams.addmember');
    Route::post('/teams/{id}/storemember/{user_id}', 'Admin\TeamsController@storemember')->name('teams.storemember');

    Route::resource('payments', Admin\PaymentsController::class);
    Route::get('/payments/{id}/info','Admin\PaymentsController@info')->name('payments.info');
    Route::get('/payments/{id}/create','Admin\PaymentsController@create')->name('payments.create');
//    Route::get('/payments/{id}/store/','Admin\PaymentsController@store')->name('payments.store');
    Route::post('/payments/{id}/store/','Admin\PaymentsController@store')->name('payments.store');

    Route::get('/dashboard','Admin\DashboardController@index')->name('dashboard.index');








});
