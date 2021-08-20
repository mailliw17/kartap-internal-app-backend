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

Route::get('about-us', 'API\AboutUsController@index');
Route::get('career', 'API\CareerController@index');
Route::get('event', 'API\EventController@index');
Route::get('contact-us', 'API\ContactUsController@index');
Route::get('career-member', 'API\CareerMemberController@index');
Route::get('testimony', 'API\TestimonyController@index');
Route::get('partner', 'API\PartnerController@index');
Route::get('event-member', 'API\EventMemberController@index');

Route::post('career', 'API\CareerController@create');
Route::post('about-us', 'API\AboutUsController@create');
Route::post('event', 'API\EventController@create');
Route::post('contact-us', 'API\ContactUsController@create');
Route::post('career-member', 'API\CareerMemberController@create');
Route::post('testimony', 'API\TestimonyController@create');
Route::post('partner', 'API\PartnerController@create');
Route::post('event-member', 'API\EventMemberController@create');

Route::put('/about-us/{id}', 'API\AboutUsController@update');
Route::put('/career/{id}', 'API\CareerController@update');
Route::put('/event/{id}', 'API\EventController@update');
Route::put('/career-member/{id}', 'API\CareerMemberController@update');
Route::put('/testimony/{id}', 'API\TestimonyController@update');
Route::put('/partner/{id}', 'API\PartnerController@update');
Route::put('/event-member/{id}', 'API\EventMemberController@update');

Route::delete('/about-us/{id}', 'API\AboutUsController@delete');
Route::delete('/career/{id}', 'API\CareerController@delete');
Route::delete('/event/{id}', 'API\EventController@delete');
Route::delete('/career-member/{id}', 'API\CareerMemberController@delete');
Route::delete('/testimony/{id}', 'API\TestimonyController@delete');
Route::delete('/partner/{id}', 'API\PartnerController@delete');
Route::delete('/event-member/{id}', 'API\EventMemberController@delete');
