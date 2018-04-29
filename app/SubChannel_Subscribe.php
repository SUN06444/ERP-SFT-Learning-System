<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubChannel_Subscribe extends Model
{
    // 資料表名稱
    protected $table = 'subchannel_subscribes';
    // 主鍵名稱
    protected $primaryKey = 'id';
    // 可以大量指定異動的欄位（Mass Assignment）
    protected  $fillable = [
        "user_id",
        "subchannel_id",
    ];
}
