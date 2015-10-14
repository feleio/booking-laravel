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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'professional'], function(){
    Route::group(['prefix' => 'booking'], function(){
        Route::post('get-latest', 
            ['as' => 'professional_booking_get_latest', 
             'uses' => 'BookingController@getLatestByProfessional']);
        Route::post('approve', 
            ['as' => 'professional_booking_approve', 
             'uses' => 'BookingController@approve']);
        Route::post('cancel', 
            ['as' => 'professional_booking_cancel', 
             'uses' => 'BookingController@cancel']);
        Route::post('block', 
            ['as' => 'professional_booking_block', 
             'uses' => 'BookingController@block']);
    });
    Route::group(['prefix' => 'account'], function(){
        Route::post('create', 
            ['as' => 'professional_account_create', 
             'uses' => 'ProfessionalController@create']);
        Route::post('edit', 
            ['as' => 'professional_account_edit', 
             'uses' => 'ProfessionalController@edit']);
    });
});

Route::group(['prefix' => 'customer'], function(){
    Route::group(['prefix' => 'booking'], function(){
        Route::post('create', 
            ['as' => 'customer_booking_create', 
             'uses' => 'BookingController@create']);
        Route::post('cancel', 
            ['as' => 'customer_booking_cancel', 
             'uses' => 'BookingController@cancel']);
        Route::post('view', 
            ['as' => 'customer_booking_view', 
             'uses' => 'BookingController@getLatestByCustomer']);
    });
    Route::group(['prefix' => 'account'], function(){
        Route::post('create', 
            ['as' => 'customer_account_create', 
             'uses' => 'CustomerController@create']);
    });
});