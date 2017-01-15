<?php
use App\Org;

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
Route::get('sync', 'GithubController@syncOrgs');
Route::post('sync/{id}', 'GithubController@syncOrg');
Route::get('join/{id}', 'JoinController@showPage');
Route::post('join/{id}', 'JoinController@inviteUser');
Route::post('password/{id}', 'DashboardController@changePassword');

// Auth routes
Route::get('login', 'LoginController@showLogin');
Route::post('login', 'LoginController@authorizeUser');
Route::get('callback', 'LoginController@loginUser');
Route::post('logout', 'LoginController@logoutUser');
