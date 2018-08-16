<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建管理员数据表(manager)
        Schema::create('manager',function(Blueprint $table){
            $table -> increments('id'); //自增主键
            $table -> string('username',20) -> notnull() -> comment('用户名');
            $table -> string('password',255) -> notnull() -> comment('密码');
            $table -> string('name',10) -> notnull() -> comment('姓名');
            $table -> enum('gender',['男','女','保密']) -> notnull() -> comment('性别');
            $table -> char('mobile',11) -> nullable() -> comment('手机号');
            $table -> string('email',40) -> nullable() -> comment('电子邮箱');    
            $table -> enum('status',['1','2']) -> notnull() -> default('2') -> comment('状态,1=禁用,2=启用');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除管理员数据表(manager)
        Schema::dropIfExists('manager');
    }
}
