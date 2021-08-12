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
Route::get('event', 'API\EventController@index');
Route::get('contactus', 'API\ContactUsController@index');

Route::post('career', 'API\CareerController@create');
Route::post('aboutus', 'API\AboutUsController@create');
Route::post('event', 'API\EventController@create');
Route::post('contactus', 'API\ContactUsController@create');

Route::put('/aboutus/{id}', 'API\AboutUsController@update');
Route::put('/career/{id}', 'API\CareerController@update');
Route::put('/event/{id}', 'API\EventController@update');

Route::delete('/aboutus/{id}', 'API\AboutUsController@delete');
Route::delete('/career/{id}', 'API\CareerController@delete');
Route::delete('/event/{id}', 'API\EventController@delete');
