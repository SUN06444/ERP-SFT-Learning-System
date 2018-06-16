<?php

use Illuminate\Database\Seeder;
use App\UserAuth as UserAuthEloquent;
use App\Channel as ChannelEloquent;
use App\SubChannel as SubChannelEloquent;
use App\Video as VideoEloquent;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //使用者建立
        UserAuthEloquent::create([ 'email' => 'sun.ios06444@gmail.com',
            'password' => '$2y$10$GZT5qC1/ctzXWfsAuVOc2O02TVd0UussaJMjwMHzuJa3xy2aqcjJq'
            , 'facebook_id' => 'NULL', 'type' => 'A', 'nickname' => '靖茹', 'note' => 'NULL'
        ]);

        UserAuthEloquent::create([ 'email' => '3a432014@gm.student.ncut.edu.tw',
            'password' => '$2y$10$GZT5qC1/ctzXWfsAuVOc2O02TVd0UussaJMjwMHzuJa3xy2aqcjJq'
            , 'facebook_id' => 'NULL', 'type' => 'A', 'nickname' => '琇容', 'note' => 'NULL'
        ]);

        UserAuthEloquent::create([ 'email' => '3a432006@gm.student.ncut.edu.tw',
            'password' => '$2y$10$GZT5qC1/ctzXWfsAuVOc2O02TVd0UussaJMjwMHzuJa3xy2aqcjJq'
            , 'facebook_id' => 'NULL', 'type' => 'A', 'nickname' => '佳宜', 'note' => 'NULL'
        ]);

        UserAuthEloquent::create([ 'email' => 'sun.mlr06444@gmail.com',
            'password' => '$2y$10$IRQQVXrKCDzxVNhpA6/bwuqXMD7a/MearT1NiGXosFpFOF5wc5.BW'
            , 'facebook_id' => '2049409421969681', 'type' => 'G', 'nickname' => '東東', 'note' => 'NULL'
        ]);


        //總頻道建立
        ChannelEloquent::create(['name' => '官方頻道','created_at' =>'2018-04-01 08:00:00',
            'updated_at' => '2018-04-01 08:00:00']);
        ChannelEloquent::create(['name' => '開放式頻道','created_at' =>'2018-04-02 08:02:20',
            'updated_at' => '2018-04-02 08:02:20']);

        //子頻道建立
        SubChannelEloquent::create(['user_id' => '2','channel_id' => '1','name' => 'ERP廠區生產追蹤 - 動畫篇',
            'description' => '以ERP為基礎資訊平台後，為了因應插差單的複雜性，必須更精準的掌控工單生產的狀況?製程的進度?良率的狀況?缺料的資訊?產線工序如何調度及安排？
            導入SFT廠區生產追蹤系統，輔以電子看板呈現，從接單到入庫全程掌握生產資訊， 即時監控，彈性調整，準時達交訂單，落實目視管理及走動式管理，
            生產資訊可透明化的被掌控。', 'color' => 'purple']);

        SubChannelEloquent::create(['user_id' => '3','channel_id' => '1', 'name' => '蛋黃酥 - 案例教學', 'description' => '本頻道結合我們的蛋黃酥教學案例，
        以最實際的工廠生產案例來讓學習者更加容易學習，同時將每一個步驟分解講解，藉由文檔以及影片的相輔相成之下，輕鬆學習無負擔。',
            'color' => 'green']);

        SubChannelEloquent::create(['user_id' => '4','channel_id' => '2','name' => '工業 4.0',
            'description' => '工業4.0簡單的說，就是大量運用自動化機器人、感測器物聯網、供應鏈互聯網、銷售及生產大數據分析，
            以人機協作方式提升全製造價值鏈之生產力及品質。 工業4.0的精神是連結與優化，連結製造相關元素，進行優化，以增進企業競爭力與獲利。 
            日本廠商目標重點在追求「零停機、零待料」，德國工業4.0終極目標則設在相同成本下，達到經濟批量為1的「最大客製化」生產彈性。',
            'color' => 'cadetblue']);

        //影片建立
        VideoEloquent::create(['user_id' => '1', 'subchannel_id' => '2',
            'title' => '[蛋黃酥案例]-生產線建立作業-01', 'author' => 'Jing-Ru Sun', 'video_id' => 'go6q_ZKRnvE',
            'content' => '基本資料管理系統 - 生產線資料 : 以生產「蛋黃酥禮盒」為案例，總共分成三條生產線。裡面含有BOM表介紹、產品製程說明。',
            'views_num' => '15', 'likes_num' => '0' ,
            'status' => '1', 'note' => 'NULL' , 'created_at' =>'2018-04-01 03:25:21',
            'updated_at' => '2018-04-01 03:25:21'
        ]);

        VideoEloquent::create(['user_id' => '2', 'subchannel_id' => '1',
            'title' => 'ERP 和 SFT 小教室', 'author' => '鄔琇容', 'video_id' => '-pSoxI-69fA',
            'content' => '透過舉例的方式，簡單說明ERP和SFT之間的關聯性。動畫使用軟體為 crazytalk animator 3 和 威力導演後製 和 工研院的文字語音web服務',
            'views_num' => '20', 'likes_num' => '0' ,
            'status' => '1', 'note' => 'NULL' , 'created_at' =>'2018-04-01 05:25:21',
            'updated_at' => '2018-04-01 05:25:21'
        ]);

        VideoEloquent::create(['user_id' => '2', 'subchannel_id' => '1',
            'title' => 'ERP介紹小故事-ERP是甚麼?', 'author' => '鄔琇容', 'video_id' => '5S5tXbeCWQI',
            'content' => '透過採買的流程介紹什麼是ERP。使用軟體為 crazytalk animator 3 和 威力導演後製 和 工研院的文字語音web服務',
            'views_num' => '13', 'likes_num' => '0' ,
            'status' => '1', 'note' => 'NULL' , 'created_at' =>'2018-04-01 06:25:21',
            'updated_at' => '2018-04-01 06:25:21'
        ]);

        VideoEloquent::create(['user_id' => '2', 'subchannel_id' => '1',
            'title' => 'SFT小故事Part1-蛋黃酥禮盒小故事劇場', 'author' => '鄔琇容', 'video_id' => 'kWsRyCwESZE',
            'content' => 'SFT小故事Part1。使用軟體為 crazytalk animator 3 和 威力導演後製 和 工研院的文字語音web服務',
            'views_num' => '8', 'likes_num' => '0' ,
            'status' => '1', 'note' => 'NULL' , 'created_at' =>'2018-04-01 02:25:21',
            'updated_at' => '2018-04-01 08:25:21'
        ]);

        VideoEloquent::create(['user_id' => '2', 'subchannel_id' => '1',
            'title' => 'SFT小故事Part2-蛋黃酥禮盒小故事劇場', 'author' => '鄔琇容', 'video_id' => 'v72tg7C1Yw4',
            'content' => 'SFT小故事Part2。使用軟體為 crazytalk animator 3 和 威力導演後製 和 工研院的文字語音web服務',
            'views_num' => '3', 'likes_num' => '0' ,
            'status' => '1', 'note' => 'NULL' , 'created_at' =>'2018-04-02 03:25:21',
            'updated_at' => '2018-04-02 08:25:21'
        ]);

        VideoEloquent::create(['user_id' => '2', 'subchannel_id' => '1',
            'title' => 'SFT小故事Part3-蛋黃酥禮盒小故事劇場', 'author' => '鄔琇容', 'video_id' => 'wLa07HUxmIs',
            'content' => 'SFT小故事Part3。使用軟體為 crazytalk animator 3 和 威力導演後製 和 工研院的文字語音web服務',
            'views_num' => '3', 'likes_num' => '0' ,
            'status' => '1', 'note' => 'NULL' , 'created_at' =>'2018-04-03 04:25:21',
            'updated_at' => '2018-04-03 08:25:21'
        ]);

        VideoEloquent::create(['user_id' => '2', 'subchannel_id' => '1',
            'title' => 'SFT小故事Part4-蛋黃酥禮盒小故事劇場', 'author' => '鄔琇容', 'video_id' => 'aHjY2Bh5PTM',
            'content' => 'SFT小故事Part4。使用軟體為 crazytalk animator 3 和 威力導演後製 和 工研院的文字語音web服務',
            'views_num' => '3', 'likes_num' => '0' ,
            'status' => '1', 'note' => 'NULL' , 'created_at' =>'2018-04-04 05:25:21',
            'updated_at' => '2018-04-04 08:25:21'
        ]);

        VideoEloquent::create(['user_id' => '2', 'subchannel_id' => '1',
            'title' => 'SFT小故事Part5(完)-蛋黃酥禮盒小故事劇場', 'author' => '鄔琇容', 'video_id' => 'sDQLRIaUF8I',
            'content' => 'SFT小故事Part5。使用軟體為 crazytalk animator 3 和 威力導演後製 和 工研院的文字語音web服務',
            'views_num' => '2', 'likes_num' => '0' ,
            'status' => '1', 'note' => 'NULL' , 'created_at' =>'2018-04-05 06:25:21',
            'updated_at' => '2018-04-05 08:25:21'
        ]);


        VideoEloquent::create(['user_id' => '3', 'subchannel_id' => '2',
            'title' => '[蛋黃酥案例]-品號建立作業-02', 'author' => '賴佳宜', 'video_id' => 'QdZpZutnLhE',
            'content' => 'ERP 品號建立作業的過程介紹',
            'views_num' => '8', 'likes_num' => '0' ,
            'status' => '1', 'note' => 'NULL' , 'created_at' =>'2018-04-06 08:25:21',
            'updated_at' => '2018-04-06 08:25:21'
        ]);
        VideoEloquent::create(['user_id' => '3', 'subchannel_id' => '2',
            'title' => '[蛋黃酥案例]-製程代號建立作業-03', 'author' => '賴佳宜', 'video_id' => 'M65JYHg2Dqg',
            'content' => 'ERP 製程代號建立作業的過程介紹',
            'views_num' => '10', 'likes_num' => '0' ,
            'status' => '1', 'note' => 'NULL' , 'created_at' =>'2018-04-07 07:25:21',
            'updated_at' => '2018-04-07 07:25:21'
        ]);

        VideoEloquent::create(['user_id' => '3', 'subchannel_id' => '2',
            'title' => '[蛋黃酥案例]-產品途程建立作業-04', 'author' => '賴佳宜', 'video_id' => 'NSyUg3sSlE0',
            'content' => 'ERP 產品途程建立作業的過程介紹',
            'views_num' => '25', 'likes_num' => '0',
            'status' => '1', 'note' => 'NULL' ,'created_at' =>'2018-04-08 08:25:21',
            'updated_at' => '2018-04-08 08:25:21'
        ]);

        VideoEloquent::create(['user_id' => '3', 'subchannel_id' => '2',
            'title' => '[蛋黃酥案例]-SFT操作過程(含線上派工)-Part1', 'author' => '賴佳宜', 'video_id' => 'PE-LydpAl8g',
            'content' => 'SFT操作過程(含線上派工)-Part1',
            'views_num' => '18', 'likes_num' => '0',
            'status' => '1', 'note' => 'NULL' ,'created_at' =>'2018-04-08 09:25:21',
            'updated_at' => '2018-04-08 09:25:21'
        ]);

        VideoEloquent::create(['user_id' => '3', 'subchannel_id' => '2',
            'title' => '[蛋黃酥案例]-SFT操作過程(含線上派工)-Part2', 'author' => '賴佳宜', 'video_id' => 'uYGnm_ju_Bs',
            'content' => 'SFT操作過程(含線上派工)-Part2',
            'views_num' => '20', 'likes_num' => '0',
            'status' => '1', 'note' => 'NULL' ,'created_at' =>'2018-04-08 10:25:21',
            'updated_at' => '2018-04-08 10:25:21'
        ]);

        VideoEloquent::create(['user_id' => '3', 'subchannel_id' => '2',
            'title' => '[蛋黃酥案例]-SFT操作過程(不含線上派工)', 'author' => '賴佳宜', 'video_id' => '7br5fptA7X0',
            'content' => 'SFT操作過程(不含線上派工)',
            'views_num' => '16', 'likes_num' => '0',
            'status' => '1', 'note' => 'NULL' ,'created_at' =>'2018-04-08 11:25:21',
            'updated_at' => '2018-04-08 11:25:21'
        ]);


        VideoEloquent::create(['user_id' => '4', 'subchannel_id' => '3',
            'title' => 'NCUT馬座自動倉儲', 'author' => 'NCUT工業工程管理學系', 'video_id' => 'K6Qvvirsi8o',
            'content' => 'NCUT馬座自動倉儲，由工業工程管理學系所提供。',
            'views_num' => '15', 'likes_num' => '0',
            'status' => '0', 'note' => 'NULL' , 'created_at' =>'2018-04-09 08:25:21',
            'updated_at' => '2018-04-09 08:25:21'
        ]);

        VideoEloquent::create(['user_id' => '4', 'subchannel_id' => '3',
            'title' => 'NCUT四軸手臂及雷雕流程', 'author' => 'NCUT工業工程管理學系', 'video_id' => 'ivoGAmFOYoU',
            'content' => 'NCUT四軸手臂及雷雕流程，本片由工業工程管理學系所提供。',
            'views_num' => '8', 'likes_num' => '0',
            'status' => '0' , 'note' => 'NULL', 'created_at' =>'2018-04-10 08:25:21',
            'updated_at' => '2018-04-10 08:25:21'
        ]);

        VideoEloquent::create(['user_id' => '4', 'subchannel_id' => '3',
            'title' => 'NCUT AGV無人車搬運流程', 'author' => 'NCUT工業工程管理學系', 'video_id' => '-fSQueRhsCc',
            'content' => 'NCUT AGV無人車搬運流程，本影片由工業工程管理學系所提供。',
            'views_num' => '20', 'likes_num' => '0',
            'status' => '0' , 'note' => 'NULL' , 'created_at' =>'2018-04-11 08:25:21',
            'updated_at' => '2018-04-11 08:25:21'
        ]);
    }
}
