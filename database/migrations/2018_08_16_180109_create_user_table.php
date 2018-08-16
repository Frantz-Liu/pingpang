<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //建表
        Schema::create('user',function (Blueprint $table){
        //针对具体字段进行设计
            $table -> increments('id');//主键自增长
            $table -> string('name',15) -> notnull()->comment('姓名');
            $table -> enum('gender',['男','女']) -> notnull() ->comment('性别');
            $table -> char('country',30) -> notnull() -> comment('国家');
            $table -> string('age',2) -> notnull() -> comment('年龄');
            $table -> enum('racket_hand',['左手','右手']) -> notnull() -> comment('执拍手');
            $table -> enum('grip',['直拍','横拍']) -> notnull() -> comment('直横拍');
            $table -> char('style',20) -> notnull() ->comment('打发');
            $table -> char('pic',255) -> nullable() -> comment('头像');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删表
        Schema::dropIfExists('user');
    }
}
