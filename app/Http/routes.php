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

Route::group(array('prefix' => 'api/v1.0'), function()
    {
    	//น้าหลัก API Refference
    	Route::get('/','ApiController@refference_one_zero');
    	//ข้อมูล Authen
        Route::resource('Auth', 'AuthApiController');
        //เรียก Token จากระบบ
        Route::get('getToken','AuthApiController@getToken');
        //Management Data
        Route::get('getAccountData/{crops_id}','AccountApiController@getAccountData');
        //Crop
        //พื้นที่ปลูกของ User
        Route::get('Crop/getCropsOfUser/{users_id}','CropsApiController@crops_list');
        //ชนิดพืช วางไว้คือ ทั้งหมด หากไส่ จะเป็น id
        Route::get('Crop/getSeed/{seed_id}','CropsApiController@seeds_list');
        //พันธ์พืชจากชนิด Seeds
        Route::get('Crop/getBreedOfSeed/{seed_id}','CropsApiController@breed_list');
    });
