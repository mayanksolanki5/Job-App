<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/register', 'api\RegisterController')->middleware('auth:api');

Route::apiResource('/functional', 'api\FunctionalAPIController')->middleware('auth:api');

Route::apiResource('/category', 'api\CategoryAPIController')->middleware('auth:api');

Route::apiResource('/createjob', 'api\CreatejobAPIController')->middleware('auth:api');

Route::apiResource('/applyjob', 'api\ApplyjobAPIController')->middleware('auth:api');