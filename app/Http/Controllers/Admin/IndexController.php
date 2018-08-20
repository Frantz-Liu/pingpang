<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引用Auth门面
use Auth;
class IndexController extends Controller
{
    //首页方法 -index
    public function index(){
        //跳转到视图文件 admin/index/index.blade.php文件
        return view('admin.index.index');
    }
    //首页方法  -welcome
    public function welcome(){
        //跳转到视图文件 admin/index/welcome.balde.php文件
        return view('admin.index.welcome');
    }
    public function logout(){
        //清除session
        Auth::guard('admin')->logout();
        //跳转
        return redirect(route('login'));
    }
}
