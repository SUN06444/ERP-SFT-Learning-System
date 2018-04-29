<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubChannel extends Model
{
    // 資料表名稱
    protected $table = 'subchannels';
    // 主鍵名稱
    protected $primaryKey = 'id';
    // 可以大量指定異動的欄位（Mass Assignment）
    protected  $fillable = [
        'user_id',
        'channel_id',
        'name',
        'description',
        'color',
        'photo',
    ];
}
