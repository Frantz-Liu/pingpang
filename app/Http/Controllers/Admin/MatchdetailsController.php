<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//引入Db类
use Illuminate\Support\Facades\DB;
//引入input类
use Illuminate\Support\Facades\Input;

//会员管理控制器
class MatchdetailsController extends Controller
{
    //展示管理员数据
    public function index()
    {
        $manager = DB::table('matchdetails')->get();
        return view('admin.matchdetails.index',compact('matchdetails'));
    }

    //管理员添加
    public function add()
    {
        if(Input::method() == "POST")
        {
            //post方法提交add数据
            $data = Input::except(['_token']); //排除token验证
            //写入数据表
            $result = DB::table('matchdetails')->insert($data);
        }
        else
        {
            //get请求跳转视图
            return view('admin.matchdetails.add');
        }
        
    }

    //管理删除
    public function delete()
    {   
        $id = Input::get('id');
        $result = DB::table('matchdetails')->where('id','=',$id)->delete();
        return back(); //返回上级并刷新
    }

    //管理员修改
    public function edit()
    {
        if(Input::method() == "POST")
        {
           //post方法提交add数据
           $data = Input::except(['_token']); //排除token验证
           //写入数据表
           $result = DB::table('matchdetails')->where('id','=',$data['id'])->update($data);

        }
        else
        {
            //跳转视图
            $id = Input::get('id');
            $result = DB::table('matchdetails')->where('id','=',$id)->get(); //根据get传递的id获取数据表中的数据
            return view('admin.matchdetails.edit',compact('result'));
        }
    }
}
