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

Route::middleware('jwt.auth')->get('users', function () {
    return auth('api')->user();
});
Route::group([

    'middleware' => 'api'

], function ($router) {
    Route::post('login', 'APIController@login');
    Route::post('register', 'APIController@register');
    Route::post('logout', 'APIController@logout');
    Route::post('refresh', 'APIController@refresh');
    Route::post('me', 'APIController@me');
    Route::resource('services', 'ServicesController');
    Route::get('projects/feedbacks', 'ProjectController@feedbacks');
    Route::resource('projects', 'ProjectController');
    Route::get('customers/list', 'CustomerController@list');
    Route::resource('customers', 'CustomerController');

});