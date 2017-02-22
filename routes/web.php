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
Route::get('dashboard', 'DashboardController@showDashboard');
Route::get('org/{org}', 'OrgController@showPage');
Route::post('org/{org}', 'OrgController@changePassword');
Route::put('org/{org}', 'OrgController@updateOrg');
Route::delete('org/{org}', 'OrgController@deleteOrg');
Route::get('sync', 'GithubController@syncOrgs');
Route::post('sync/{org}', 'GithubController@syncOrg');
Route::get('join/{org}', 'JoinController@showPage');
Route::post('join/{org}', 'JoinController@inviteUser');
Route::post('password/{org}', 'DashboardController@changePassword');
Route::get('developer', 'DeveloperController@index');
Route::get('token', 'DeveloperController@token');
Route::delete('token', 'DeveloperController@deleteToken');

// Auth routes
Route::get('login', 'LoginController@showLogin');
Route::post('login', 'LoginController@authorizeUser');
Route::get('callback', 'LoginController@loginUser');
Route::post('logout', 'LoginController@logoutUser');
