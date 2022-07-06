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
    return view('welcome');
});

Route::get('/login','App\Http\Controllers\CustomAuthController@login')->middleware('PreventLoginPage');
Route::get('/register','App\Http\Controllers\CustomAuthController@register')->middleware('PreventLoginPage');
Route::post('/register_user','App\Http\Controllers\CustomAuthController@register_user')->name('register_user');
Route::post('/login_user','App\Http\Controllers\CustomAuthController@login_user')->name('login_user');
Route::get('/dashboard','App\Http\Controllers\CustomAuthController@dashboard')->middleware('isLoggedIn');
Route::get('/logout','App\Http\Controllers\CustomAuthController@logout');

// Route for deletion 
Route::get('/delete/{id}','App\Http\Controllers\CustomAuthController@delete')->middleware('DeleteCheck');

// Route for editing
Route::get('/edit_user/{id}','App\Http\Controllers\CustomAuthController@edit_userm')->middleware('EditCheck');
Route::get('/edit_admin/{id}','App\Http\Controllers\CustomAuthController@edit_adminm')->middleware('EditCheck');
Route::post('/edit_admin','App\Http\Controllers\CustomAuthController@edit_admin')->name('edit_admin');
Route::post('/edit_user','App\Http\Controllers\CustomAuthController@edit_user')->name('edit_user');