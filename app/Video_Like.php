<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video_Like extends Model
{
    // 資料表名稱
    protected $table = 'video_likes';
    // 主鍵名稱
    protected $primaryKey = 'id';
    // 可以大量指定異動的欄位（Mass Assignment）
    protected  $fillable = [
        'user_id',
        'like_video_id',
    ];
}
