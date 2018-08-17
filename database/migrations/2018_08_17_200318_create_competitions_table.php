<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建管理员数据表(competitions)
        Schema::create('competitions',function(Blueprint $table){
            $table -> increments('id'); //自增主键
            $table -> string('competitions_name',50) -> notnull() -> comment('赛事名称');
            $table -> date('date') -> notnull() -> comment('赛事日期');
            $table -> enum('events',['男单','男双','女单','女双','混双','男团','女团']) -> notnull() -> comment('比赛项目');
            $table -> string('counrty',20) -> notnull() -> comment('比赛国家');
            $table -> string('city',20) -> notnull() -> comment('比赛城市');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除管理员数据表(competitions)
        Schema::dropIfExists('competitions');
    }
}
