<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
