<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); //會員編號
            $table->string('nickname',50); //暱稱
            $table->string('email')->unique(); //Email
            $table->string('password',60); //密碼
            $table->string('type',1)->default('G'); //帳號類型 G:一般會員 A:管理員
            $table->string('note', 150)->nullable(); //備註
            $table->timestamps(); //時間戳記
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
