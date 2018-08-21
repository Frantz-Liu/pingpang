<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    //展示比赛的数据
    public function list(){
        return view('front.list.index');
    }
}
