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

// global prefix version
$version = 'v1';

Route::group([
    'prefix'        => $version,
    'namespace'     => 'Api',
], function () {
    // Event Module
	Route::group([
		'namespace' => 'Event',
	], function(){
		Route::group([
			'prefix' => 'event',
		], function(){
            Route::get('get-by-year-month', 'GetByYearMonthController');
            Route::post('add-multiple', 'AddMultipleEventController');
		});
		Route::resource('event', 'EventController');
	});
});
