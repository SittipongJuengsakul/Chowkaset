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
Route::get('/home','HomeController@index');
Route::get('/chatkaset','forumsController@index');
Route::get('/officer','OfficerController@index');

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/profile','Auth\ChangeProfile@getCreateProfile');
Route::post('auth/profile/commit','Auth\ChangeProfile@postCreateProfile');
Route::get('auth/changeprofile','Auth\ChangeProfile@getChangeprofile');
Route::post('auth/changeprofile/commit','Auth\ChangeProfile@postChangeprofile');
Route::post('auth/chowkaset/checkUsername','Auth\AuthController@checkUsername');
Route::post('auth/chowkaset/postLogin','Auth\AuthController@postLogin');
Route::post('auth/chowkaset/postRegister','Auth\AuthController@postRegister');

Route::group(array('prefix' => '/api/v1.0'), function()
    {
    	//น้าหลัก API Refference
    	Route::get('/','apiv1_0\ApiController@refference_one_zero');

    	//ข้อมูล Authen
        Route::resource('Auth', 'apiv1_0\AuthApiController');
        //เรียก Token จากระบบ
        Route::get('getToken','apiv1_0\AuthApiController@getToken');
        //Crop
        
        //ดูข้อมูลการเพาะปลูก
        Route::get('Crop/mapdetail/{id}','apiv1_0\CropsApiController@map_detail');
        //
        Route::post('Crop/new_crop','apiv1_0\CropsApiController@new_crop');
        //พื้นที่ปลูกของ User
        Route::get('Crop/getCropsOfUser/{user_id}','apiv1_0\CropsApiController@crops_list');
        //สถืตืการเพาะปลุกทั้งหมด
        Route::get('Crop/getCropsOfUserDetailList/{user_id}','apiv1_0\CropsApiController@crops_detail_list');
        //ชนิดพืช วางไว้คือ ทั้งหมด หากไส่ จะเป็น id
        Route::get('Crop/getSeedAll','apiv1_0\CropsApiController@seeds_all_list');
        Route::get('Crop/getSeed/{seed_id}','apiv1_0\CropsApiController@seeds_list');
        //พันธ์พืชจากชนิด Seeds
        Route::get('Crop/getBreedOfSeed/{seed_id}','apiv1_0\CropsApiController@breed_list');
        //ข้อมูลรายรับ,รายจ่าย
        Route::get('Crop/getAccountCrop/{crop_id}','apiv1_0\CropsApiController@getAccountData');
        //เพิ่มรายรับ,รายจ่าย
        Route::post('Crop/AddAccountData','apiv1_0\CropsApiController@AddAccountData');
        //ลบรายรับ,รายจ่าย
        Route::delete('Crop/DeleteAccountData','apiv1_0\CropsApiController@DeleteAccountData');
        //แก้ใขรายรับ,รายจ่าย
        Route::put('Crop/EditAccountData','apiv1_0\CropsApiController@EditAccountData');
        //ข้อมูลปัญหาการเพาะปลูก
        Route::get('Crop/getProblemCrop/{crop_id}','apiv1_0\CropsApiController@getProblemData');
        //เพิ่มปัญหาการเพาะปลูก
        Route::post('Crop/AddProblemData','apiv1_0\CropsApiController@AddProblemData');
        //ลบรายรับ,รายจ่าย
        Route::delete('Crop/DeleteProblemData','apiv1_0\CropsApiController@DeleteProblemData');
        //แก้ใขรายรับ,รายจ่าย
        Route::put('Crop/EditProblemData','apiv1_0\CropsApiController@EditProblemData');

    });
