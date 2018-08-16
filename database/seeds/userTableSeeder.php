<?php

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //执行数据表的填充
        //生成faker实例
        $faker = \Faker\Factory::create('zh_CN');//faker本地化
        //生成10条数据
        $data = [];
        for($i =0 ;$i<10;$i++){
            $data[] =[
                'name' => $faker ->userName,
                'gender' => rand(1,2),
                'country' => $faker->city,
                'age' => $faker->numberBetween(10,50),//faker生成年龄
                'racket_hand' => rand(1,2),//rand随机生成左手或右手
                'grip' => rand(1,2),//随机生成
                'style' => ' ',//管理员进行添加字段
                'pic' => 'img111'//测试用的字符串
            ];
        }
        //写入数据表
        DB::table('user') -> insert($data);
    }
}
