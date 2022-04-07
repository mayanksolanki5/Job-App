<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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


Route::get('/', 'UserController@index')->name('index')->middleware('authcheck');

Route::post('/loginverify','UserController@loginverify')->name('loginverify')->middleware('authcheck');

// Route::get('/logout', 'HomeController@logout')->name('logout');

Route::get('/loginpage','UserController@loginpage')->name('loginpage')->middleware('authcheck');
Route::get('/registerpage','UserController@registerpage')->name('registerpage')->middleware('authcheck');

Route::get('/home', 'HomeController@index')->name('home')->middleware('authcheck')->middleware('statuscheck');

// Route::post('/registerpage','HomeController@logincall')->name('registerpage') ;

Route::get('/forgotpassword', 'UserController@forgotpassword')->name('forgotpassword');
Route::post('/verifyemail', 'UserController@verifyemail')->name('verifyemail');
Route::get('/resetpassword', 'UserController@resetpassword')->name('resetpassword')->middleware('authcheck')->middleware('statuscheck');
Route::post('/resetpwd', 'UserController@resetpwd')->name('resetpwd')->middleware('authcheck');

Auth::routes();

Route::get('/profile', 'HomeController@profile')->name('profile')->middleware('authcheck')->middleware('statuscheck');

Route::post('/update', 'HomeController@update')->name('update')->middleware('authcheck');

Route::get('users', ['uses'=>'UserController@table', 'as'=>'users.index'])->middleware('authcheck')->middleware('statuscheck');


Route::post('/delete/{id}', 'UserController@destroy')->middleware('authcheck');
Route::get('/edit/{id}', 'UserController@edit')->middleware('authcheck')->middleware('statuscheck');
Route::get('/loginstatus/{id}','UserController@loginstatus')->middleware('authcheck')->middleware('statuscheck');

Route::get('/inactive/{id}','UserController@inactive')->middleware('authcheck');
Route::get('/active/{id}','UserController@active')->middleware('authcheck');




Route::post('/updateall/{id}','HomeController@updateall')->middleware('authcheck');

// Route::get('deleteuser',[UserController::class,'deleteuser'])->name('deleteuser');
// Route::get('edituser',[UserController::class,'edituser'])->name('edituser');