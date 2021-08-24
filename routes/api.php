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
Route::get('get-users', 'API\AuthController@getUsers');
Route::get('detail-user', 'API\DetailUserController@index');
Route::get('department', 'API\DepartmentController@index');
Route::get('division', 'API\DivisionController@index');
Route::get('role', 'API\RoleController@index');
Route::get('event-coordinator', 'API\EventCoordinatorController@index');
Route::get('event-partner', 'API\EventPartnerController@index');
Route::get('registered-event', 'API\RegisteredEventController@index');

Route::post('career', 'API\CareerController@create');
Route::post('about-us', 'API\AboutUsController@create');
Route::post('event', 'API\EventController@create');
Route::post('contact-us', 'API\ContactUsController@create');
Route::post('career-member', 'API\CareerMemberController@create');
Route::post('testimony', 'API\TestimonyController@create');
Route::post('partner', 'API\PartnerController@create');
Route::post('event-member', 'API\EventMemberController@create');
Route::post('register', 'API\AuthController@register');
Route::post('detail-user', 'API\DetailUserController@create');
Route::post('department', 'API\DepartmentController@create');
Route::post('division', 'API\DivisionController@create');
Route::post('role', 'API\RoleController@create');
Route::post('event-coordinator', 'API\EventCoordinatorController@create');
Route::post('event-partner', 'API\EventPartnerController@create');
Route::post('registered-event', 'API\RegisteredEventController@create');

Route::put('/about-us/{id}', 'API\AboutUsController@update');
Route::put('/career/{id}', 'API\CareerController@update');
Route::put('/event/{id}', 'API\EventController@update');
Route::put('/career-member/{id}', 'API\CareerMemberController@update');
Route::put('/testimony/{id}', 'API\TestimonyController@update');
Route::put('/partner/{id}', 'API\PartnerController@update');
Route::put('/event-member/{id}', 'API\EventMemberController@update');
Route::put('/detail-user/{id}', 'API\DetailUserController@update');
Route::put('/department/{id}', 'API\DepartmentController@update');
Route::put('/division/{id}', 'API\DivisionController@update');
Route::put('/role/{id}', 'API\RoleController@update');

Route::delete('/about-us/{id}', 'API\AboutUsController@delete');
Route::delete('/career/{id}', 'API\CareerController@delete');
Route::delete('/event/{id}', 'API\EventController@delete');
Route::delete('/career-member/{id}', 'API\CareerMemberController@delete');
Route::delete('/testimony/{id}', 'API\TestimonyController@delete');
Route::delete('/partner/{id}', 'API\PartnerController@delete');
Route::delete('/event-member/{id}', 'API\EventMemberController@delete');
Route::delete('/delete-user/{id}', 'API\AuthController@deleteUser');
Route::delete('/detail-user/{id}', 'API\DetailUserController@delete');
Route::delete('/department/{id}', 'API\DepartmentController@delete');
Route::delete('/division/{id}', 'API\DivisionController@delete');
Route::delete('/role/{id}', 'API\RoleController@delete');
