<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//引入Db类
use Illuminate\Support\Facades\DB;
//引入input类
use Illuminate\Support\Facades\Input;

//会员管理控制器
class ManagerController extends Controller
{
    //展示管理员数据
    public function index()
    {
        $manager = DB::table('manager')->get();
        //printf($manager);
        return view('admin.manager.index',compact('manager'));
    }

    //管理员添加
    public function add()
    {
        if(Input::method() == "POST")
        {
            //post方法提交add数据
        }
        else
        {
            //跳转视图
            return view('admin.manager.add');
        }
        
    }

    //管理删除
    public function delete()
    {
        
    }

    //管理员修改
    public function edit()
    {
        if(Input::method() == "POST")
        {
            //post方法提交add数据
        }
        else
        {
            //跳转视图
            return view('admin.manager.edit');
        }
    }
}
