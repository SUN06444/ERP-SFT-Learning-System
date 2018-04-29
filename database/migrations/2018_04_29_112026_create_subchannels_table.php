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
            $table->increments('id'); $table->integer('channel_id')->unsigned();
            $table->string('name',20); //頻道名稱
            $table->string('description', 300); //頻道描述
            $table->string('color',20); //分類標籤(顏色)
            $table->string('photo')->nullable(); //頻道圖片
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
