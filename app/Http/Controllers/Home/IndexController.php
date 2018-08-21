<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Response;

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

    public function getDate()
    {
        //$data = Input::get();
        //$b = $data['key']['game_data'];
        //dd($data['key']['game_date']);
        $a = ["game_date" =>'sb'];
        echo json_encode($a);
    }
}
