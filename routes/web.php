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
    echo 'WIP';
});
Route::get('login', 'LoginController@showLogin');
Route::post('login', 'LoginController@authorizeUser');
Route::get('callback', 'LoginController@loginUser');
Route::post('logout', 'LoginController@logoutUser');
Route::get('dashboard', 'DashboardController@showDashboard');
Route::get('sync', 'GithubController@syncOrgs');
