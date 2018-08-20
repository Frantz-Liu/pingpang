<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //前台首页
    public function index()
    {
        //展示首页
        return view('home.index.index');
    }
}
