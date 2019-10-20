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

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('about', 'HomeController@about')->name('about');
Route::get('contact', 'HomeController@contact')->name('contact');

Route::get('register/confirm', 'Auth\RegisterConfirmationController@index')->name('register.confirm');

Route::get('profiles/{scorer}', 'ProfilesController@show')->name('profile');
//Route::get('/profiles/{scorer}/notifications', 'ScorerNotificationsController@index');
//Route::delete('/profiles/{scorer}/notifications/{notification}', 'ScorerNotificationsController@destroy');

Route::get('api/scorers', 'Api\ScorersController@index');
Route::post('api/scorers/{scorer}/avatar', 'Api\ScorersAvatarController@store')->middleware('auth')->name('avatar');

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth',
    'namespace' => 'Admin'
], function () {
    Route::get('', 'DashboardController@index')->name('admin.dashboard.index');
//    Route::post('channels', 'ChannelsController@store')->name('admin.channels.store');
    Route::get('school', 'AdminSchoolController@show')->name('admin.school.show');
    Route::get('team', 'AdminTeamController@show')->name('admin.team.show');

//    Route::get('channels/create', 'ChannelsController@create')->name('admin.channels.create');
//    Route::get('channels/{channel}/edit', 'ChannelsController@edit')->name('admin.channels.edit');
//    Route::patch('channels/{channel}', 'ChannelsController@update')->name('admin.channels.update');
});

Route::group([
    'prefix' => 'scoring',
    'middleware' => 'auth',
    'namespace' => 'Scoring'
], function () {
    Route::get('', 'DashboardController@index')->name('scoring.dashboard.index');
//    Route::post('channels', 'ChannelsController@store')->name('admin.channels.store');
    Route::get('summary', 'ScoringSummaryController@show')->name('scoring.summary.show');
    Route::get('game', 'ScoringGameController@show')->name('scoring.game.show');
//    Route::get('channels/create', 'ChannelsController@create')->name('admin.channels.create');
//    Route::get('channels/{channel}/edit', 'ChannelsController@edit')->name('admin.channels.edit');
//    Route::patch('channels/{channel}', 'ChannelsController@update')->name('admin.channels.update');
});