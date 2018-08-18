<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建数据表
        Schema::create('matchdetails',function(Blueprint $table)
        {
            $table -> increments('id');
            $table -> tinyInteger('match_id') -> notnull() -> comment('比赛id');
            $table -> tinyInteger('order') -> notnull() -> comment('顺序');
            $table -> tinyInteger('game') -> notnull() -> comment('局数');
            $table -> tinyInteger('a_score') -> notnull() -> comment('A总得分');
            $table -> tinyInteger('b_score') -> notnull() -> comment('B总得分');
            $table -> tinyInteger('server_id') -> notnull() -> comment('发球方运动员id');
            $table -> tinyInteger('a_cout') -> notnull() -> comment('A拍数');
            $table -> tinyInteger('b_cout') -> notnull() -> comment('B拍数');
            $table -> tinyInteger('a_method') -> notnull() -> comment('A手段');
            $table -> tinyInteger('b_method') -> notnull() -> comment('B手段');
            $table -> tinyInteger('order_winner') -> notnull() -> comment('得分方id');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
