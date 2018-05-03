<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','SubChannelController@index');

// 使用者(會員)
Route::group(['prefix' => 'user'], function(){
    // 使用者驗證
    Route::group(['prefix' => 'auth'], function(){
        Route::get('/sign-up', 'UserAuthController@signUpPage');
        Route::post('/sign-up', 'UserAuthController@signUpProcess');
        Route::get('/sign-in', 'UserAuthController@signInPage');
        Route::post('/sign-in', 'UserAuthController@signInProcess');
        Route::get('/sign-out', 'UserAuthController@signOut');
        // Facebook 登入
        Route::get('/facebook-sign-in', 'UserAuthController@facebookSignInProcess');
        // Facebook 登入重新導向授權資料處理
        Route::get('/facebook-sign-in-callback', 'UserAuthController@facebookSignInCallbackProcess');
    });
});

// 頻道&影片
Route::group(['prefix' => 'channel'], function(){
    Route::group(['prefix' => 'official'], function() {
        Route::get('{subchannel_name}','SubChannelController@video_areaPage'); //影片頻道分類
        Route::get('{subchannel_name}/sort={sort}','SubChannelController@channel_video_area_sortPage'); //影片頻道分類+排序(按時間、瀏覽、喜愛)
    });

    Route::group(['prefix' => 'open'], function() {
        Route::get('{subchannel_name}','SubChannelController@video_areaPage'); //影片頻道分類
        Route::get('{subchannel_name}/sort={sort}','SubChannelController@channel_video_area_sortPage'); //影片頻道分類+排序(按時間、瀏覽、喜愛)
    });

});
