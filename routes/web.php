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

//管理人員後台
Route::group(['prefix' => 'admin'], function(){

    Route::get('/','Admin\AdminController@index');

    Route::get('/question_list','Admin\AdminController@question_list');


    Route::group(['prefix' => 'subchannel'], function(){

        Route::group(['prefix' => '{channel}'], function(){
            Route::get('/list','Admin\SubChannelController@list');
            Route::get('/edit/{id}','Admin\SubChannelController@edit');
            Route::post('/update/{id}','Admin\SubChannelController@update');
        });

    });


    Route::group(['prefix' => 'video'], function(){

        Route::group(['prefix' => '{video_type}'], function(){
            Route::get('/list','Admin\VideoController@list');
            Route::get('/{status}/{id}','Admin\VideoController@edit');
        });

        //官方頻道 可編輯影片
        Route::post('/official/update/{id}','Admin\VideoController@update');

        //開放式頻道 審核影片通不通過，影片不通過新增備註
        Route::post('/open/pass/{id}','Admin\VideoController@pass');
        Route::post('/open/nopass/{id}','Admin\VideoController@nopass');
        Route::post('/open/note/{id}','Admin\VideoController@note');

    });

    Route::group(['prefix' => 'user'], function(){
        Route::group(['prefix' => 'admin'], function(){
            Route::get('/list','Admin\UserController@admin_list');
            Route::get('/edit/{id}','Admin\UserController@admin_edit');
            Route::post('/update/{id}','Admin\UserController@admin_update');
        });

        Route::group(['prefix' => 'general'], function(){
            Route::get('/list','Admin\UserController@general_list');
            Route::get('/edit/{id}','Admin\UserController@general_edit');
            Route::post('/update/{id}','Admin\UserController@general_update');
        });
    });

    Route::get('/videos_list','Admin\AdminController@videos_list');

    Route::get('/users_list','Admin\AdminController@users_list');
});


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
