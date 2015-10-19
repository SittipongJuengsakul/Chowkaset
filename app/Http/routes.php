<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');
Route::get('home','HomeController@index');
Route::get('test/{id}','ajaxrespond@map_detail');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);
Route::get('changeprofile','profileController@index');
Route::post('changeprofile/commit','profileController@profilechange');
Route::post('new_crop','ajaxrespond@new_crop');

Route::group(array('prefix' => 'api/v1'), function()
    {
        Route::resource('Auth', 'AuthApiController');
        Route::get('getToken','AuthApiController@getToken');
        Route::get('getAccountData/{crops_id}','AccountApiController@getAccountData');
    });
