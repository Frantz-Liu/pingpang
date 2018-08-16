<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入模型
use App\Model\User;
class UserController extends Controller
{
    //运动员列表
    public function index(){
        //获取数据
        $data = User::all();
        //展示视图,携带数据
        return view('admin.user.index',compact('data'));
    }
}
