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


Route::get('/', 'UserController@index')->name('index');

// Route::get('/logout', 'HomeController@logout')->name('logout');

Route::get('/loginpage','UserController@loginpage')->name('loginpage');
Route::get('/registerpage','UserController@registerpage')->name('registerpage');

Route::get('/home', 'HomeController@index')->name('home');

// Route::post('/registerpage','HomeController@logincall')->name('registerpage') ;

Route::get('/forgotpassword', 'UserController@forgotpassword')->name('forgotpassword');
Route::post('/verifyemail', 'UserController@verifyemail')->name('verifyemail');
Route::get('/resetpassword', 'UserController@resetpassword')->name('resetpassword');
Route::post('/resetpwd', 'UserController@resetpwd')->name('resetpwd');

Auth::routes();

Route::get('/profile', 'HomeController@profile')->name('profile');

Route::post('/update', 'HomeController@update')->name('update');

