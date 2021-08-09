<?php

use Illuminate\Http\Request;

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

Route::get('aboutus', 'API\AboutUsController@index');
Route::get('career', 'API\CareerController@index');

Route::post('career', 'API\CareerController@create');
Route::post('aboutus', 'API\AboutUsController@create');

Route::put('/aboutus/{lang}', 'API\AboutUsController@update');
Route::put('/career/{id_career}', 'API\CareerController@update');

Route::delete('/aboutus/{id}', 'API\AboutUsController@delete');
