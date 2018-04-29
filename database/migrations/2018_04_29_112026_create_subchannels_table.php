<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubchannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subchannels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); //創建子頻道的會員id
            $table->integer('channel_id'); //總頻道id
            $table->string('name',20); //子頻道名稱
            $table->string('description', 300); //子頻道描述
            $table->string('color',20); //標籤顏色
            $table->string('photo')->nullable(); //子頻道圖片
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subchannels');
    }
}
