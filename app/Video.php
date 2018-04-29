<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    // 資料表名稱
    protected $table = 'videos';
    // 主鍵名稱
    protected $primaryKey = 'id';
    // 可以大量指定異動的欄位（Mass Assignment）
    protected  $fillable = [
        'subchannel_id',
        'user_id',
        'title',
        'author',
        'video_id',
        'content',
        'views_num',
        'likes_num',
        'status',
        'note',
    ];
}
