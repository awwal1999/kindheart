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

// Route::apiResource('users', 'API\UserController');
Route::get('profile', 'API\UserController@profile');
Route::patch('profile', 'API\UserController@updateProfile');
Route::get('work', 'API\PatientController@work');
Route::put('work', 'API\PatientController@storeWork');
Route::get('cancer', 'API\PatientController@cancer');
Route::put('cancer', 'API\PatientController@storeCancer');
Route::get('volunteer', 'API\VolunteerController@volunteer');
Route::put('volunteer', 'API\VolunteerController@storeVolunteer');
Route::post('volunteer', 'API\VolunteerController@registerVolunteer');