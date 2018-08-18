<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建数据表
        Schema::create('matchs', function (Blueprint $table) {
            $table -> increments('id');//id自增主键
            $table -> tinyInteger('competitions_id')->notnull() -> comment('对应赛事中的ID');
            $table -> string('event', 20) -> notnull() -> comment('获取赛事表中的项目数据 比如 男单,女单');
            $table -> char('round',10) ->notnull() -> comment('阶段,例如半决赛,决赛,几轮赛事等,手动输入');
            $table -> datetime('datetime') -> notnull() -> comment('比赛时间时分秒');
            $table -> tinyInteger('table') -> notnull() -> comment('在哪一台进行比赛 手动输入');
            $table -> tinyInteger('a_id') -> notnull() -> comment('对应运动员信息表中的id');
            $table -> tinyInteger('b_id') -> notnull() -> comment('对应信息表中的运动员的id');
            $table -> tinyInteger('winner_id') -> notnull() -> comment('获胜方id 从运动员表中获取id');
            $table -> string('game_score') -> nullable() -> comment('大比分,这论比赛是谁赢了');
            $table -> string('point') -> nullable() -> comment('小比分,这局比赛谁赢了就获得一个大比分');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除数据表
        Schema::dropIfExists('matchs');
    }
}
