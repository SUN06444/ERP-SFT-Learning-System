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

Route::get('/articles','SubChannelController@index_articles');

Route::get('/faq','SubChannelController@faq');

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

    Route::get('{subchannel_name}','SubChannelController@video_areaPage'); //影片頻道分類
    Route::get('{subchannel_name}/sort={sort}','SubChannelController@video_area_sortPage'); //影片頻道分類+排序(按時間、瀏覽、喜愛)

    //點擊所選的影片內容
    Route::get('/{subchannel_id}/v={video_id}','SubChannelController@videoPage');

    //開放式頻道頁面
    Route::get('/open/subchannel','SubChannelController@subchannelPage');
    //新增頻道
    Route::post('/subchannel/add','SubChannelController@addsubchannelProcess');
    //新增影片
    Route::post('/video/add','SubChannelController@addvideosProcess');
    //當會員執行event為like、dislike、collect、discollect影片的動作
    Route::post('/{video_id}/{event}', 'SubChannelController@video_eventProcess');

    //會員訂閱頻道 & 會員取消訂閱頻道
    Route::post('/{subchannel_name}/{user_id}/subscribe','SubChannelController@subscribe_channelProcess');
    Route::post('/{subchannel_name}/{user_id}/dissubscribe','SubChannelController@dissubscribe_channelProcess');
    
});
