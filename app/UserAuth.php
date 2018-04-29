<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAuth extends Model
{
    // 資料表名稱
    protected $table = 'users';
    // 主鍵名稱
    protected $primaryKey = 'id';
    // 可以大量指定異動的欄位（Mass Assignment）
    protected  $fillable = [
        "email",
        "password",
        "facebook_id",
        "type",
        "nickname",
        "note",
    ];
}
