<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    //前台首页
    public function index()
    {
        //获得数据库数据
        $competitions = DB::table('competitions')->get();
        $user = DB::table('user') -> get();
        return view('home.index.index',compact('competitions','user'));
    }

}
