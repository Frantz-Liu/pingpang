<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入DB类
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
//赛事管理控制器
class CompetitionsController extends Controller
{
    //展示赛事列表
    public function index()
    {
        $competitions = DB::table('competitions') -> get();
        return view('admin.competitions.index',compact('competitions'));
    }

    //赛事添加
    public function add()
    {
        if(Input::method() == "POST")
        {

            //post方法提交add数据
            $data = Input::except(['_token']); //排除token验证
            $eventsArr = $data['events']; //复选框传来的数组
            $events = implode(",",$eventsArr); //传换成字符串
            $data['events'] = $events; //替换
            var_dump($data);
            //写入数据表
            $result = DB::table('competitions')->insert($data);
        }
        else
        {
            //get请求跳转视图
            return view('admin.competitions.add');
        }
    }

    //赛事删除
    public function delete()
    {
        $id = Input::get('id');
        $result = DB::table('competitions')->where('id','=',$id)->delete();
        return back(); //返回上级并刷新
    }

    //赛事修改
    public function edit()
    {
        if(Input::method() == "POST")
        {
           //post方法提交add数据
           $data = Input::except(['_token']); //排除token验证
           $eventsArr = $data['events']; //复选框传来的数组
           $events = implode(",",$eventsArr); //传换成字符串
           $data['events'] = $events; //替换
           //写入数据表
           $result = DB::table('competitions')->where('id','=',$data['id'])->update($data);
        }
        else
        {
            //跳转视图
            $id = Input::get('id');
            $result = DB::table('competitions')->where('id','=',$id)->get(); //根据get传递的id获取数据表中的数据
            return view('admin.competitions.edit',compact('result'));
        }
    }
}
