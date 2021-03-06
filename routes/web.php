<?php

use Illuminate\Support\Facades\Route;

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
    //return view('welcome');
     return redirect('/login');

});
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('migrate');
    return 'done'; //Return anything
});
Auth::routes(['register' => false]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('lang/{locale}', 'HomeController@lang');

Route::resource('balance', 'BalanceController');
Route::resource('balance-in', 'BalanceInController');
Route::resource('balance-out', 'BalanceOutController');


Route::middleware('auth')->namespace('AccessControl')->group(function () {
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
    Route::resource('matrix', 'AclController');
    Route::post('change-role-permission', 'AclController@change_role_permission');

    Route::resource('route-permit', 'RoutePermitController');

    Route::get('user-permission-matrix', 'AclController@user_permission_matrix')->name('user-permission-matrix');
    Route::post('user-permission-matrix', 'AclController@store_user_permission_matrix')->name('user-permission-matrix.store');

});
