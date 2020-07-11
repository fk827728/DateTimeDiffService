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

Route::group(['prefix' => 'v1'], function () 
{
    Route::get('/public/datetimediff/{start}/{end}', 'Api\v1\DateTimeDiffController@DateTimeDiff');
    Route::get('/public/datetimediff/{start}/{end}/{filter}', 'Api\v1\DateTimeDiffController@DateTimeDiff');

    Route::get('/datetimediff/{start}/{end}', 'Api\v1\DateTimeDiffController@DateTimeDiff')->middleware('auth:api');
    Route::get('/datetimediff/{start}/{end}/{filter}', 'Api\v1\DateTimeDiffController@DateTimeDiff')->middleware('auth:api');
});
 