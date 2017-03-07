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
Route::get('/', function () {
    return view('home');
});
Route::get('dashboard', 'DashboardController@index');
Route::get('org/{org}', 'OrgController@index');
Route::post('org/{org}', 'OrgController@changePassword');
Route::put('org/{org}', 'OrgController@update');
Route::delete('org/{org}', 'OrgController@delete');
Route::get('org/{org}/teams', 'TeamController@index');
Route::get('sync', 'GithubController@syncOrgs');
Route::post('sync/{org}', 'GithubController@syncOrg');
Route::get('join/{org}', 'JoinController@index');
Route::post('join/{org}', 'JoinController@inviteUser');
Route::get('o/{name}', 'JoinController@redirect');
Route::get('developer', 'DeveloperController@index');
Route::get('token', 'DeveloperController@token');
Route::delete('token', 'DeveloperController@deleteToken');

// Auth routes
Route::get('login', 'LoginController@authorizeUser');
Route::get('callback', 'LoginController@loginUser');
Route::post('logout', 'LoginController@logoutUser');
