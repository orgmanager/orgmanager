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

// Pages
Route::get('/', 'HomeController@index')->name('landing');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('org/{org}', 'OrgController@index')->name('org');
Route::post('org/{org}', 'OrgController@changePassword')->name('org.password');
Route::put('org/{org}', 'OrgController@update')->name('org.update');
Route::delete('org/{org}', 'OrgController@delete')->name('org.delete');
Route::post('org/{org}/message', 'OrgController@message')->name('org.message');
Route::get('org/{org}/teams', 'TeamController@index')->name('org.teams');
Route::post('org/{org}/teams', 'TeamController@syncTeams')->name('org.teams.sync');
Route::put('org/{org}/teams', 'TeamController@setTeam')->name('org.teams.set');
Route::delete('org/{org}/teams', 'TeamController@deleteTeams')->name('org.teams.delete');
Route::post('sync', 'GithubController@syncOrgs')->name('sync');
Route::post('sync/{org}', 'GithubController@syncOrg')->name('sync.org');
Route::get('join/{org}', 'JoinController@index')->name('join');
Route::post('join/{org}', 'JoinController@inviteUser')->name('join.post');
Route::get('join/{org}/callback', 'JoinController@callback')->name('join.callback');
Route::get('o/{name}', 'JoinController@redirect')->name('redirect');
Route::get('developer', 'DeveloperController@index')->name('developer');
Route::get('token', 'DeveloperController@token')->name('token');
Route::delete('token', 'DeveloperController@deleteToken')->name('token.delete');

// Auth routes
Route::get('login', 'LoginController@authorizeUser')->name('login');
Route::get('callback', 'LoginController@loginUser')->name('callback');
Route::post('logout', 'LoginController@logoutUser')->name('logout');

// Autojoiner
Route::post('autojoiner', 'AutoJoinerController@index')->name('autojoiner');
