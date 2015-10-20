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
    	Route::get('/','apiv1_0\ApiController@refference_one_zero');
    	//ข้อมูล Authen
        Route::resource('Auth', 'apiv1_0\AuthApiController');
        //เรียก Token จากระบบ
        Route::get('getToken','apiv1_0\AuthApiController@getToken');
        //Crop
        //พื้นที่ปลูกของ User
        Route::get('Crop/getCropsOfUser/{user_id}','apiv1_0\CropsApiController@crops_list');
        //ชนิดพืช วางไว้คือ ทั้งหมด หากไส่ จะเป็น id
        Route::get('Crop/getSeed','apiv1_0\CropsApiController@seeds_all_list');
        Route::get('Crop/getSeed/{seed_id}','apiv1_0\CropsApiController@seeds_list');
        //พันธ์พืชจากชนิด Seeds
        Route::get('Crop/getBreedOfSeed/{seed_id}','apiv1_0\CropsApiController@breed_list');
        //ข้อมูลรายรับ,รายจ่าย
        Route::get('Crop/getAccountCrop/{crop_id}','apiv1_0\CropsApiController@getAccountData');
    });
