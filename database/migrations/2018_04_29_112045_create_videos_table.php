<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); //發佈者的會員id
            $table->integer('subchannel_id'); //子頻道id
            $table->string('title',30); //影片標題
            $table->string('author',20); //影片原著作者
            $table->string('video_id', 40); //youtube影片ID
            $table->string('content', 150); //影片描述內容
            $table->integer('views_num'); //觀看次數
            $table->integer('likes_num'); //喜愛次數
            $table->integer('status'); //審核狀態(0 => no pass , 1 => pass)
            $table->string('note', 150)->nullable(); //備註
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
        Schema::dropIfExists('videos');
    }
}
