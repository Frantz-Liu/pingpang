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

    public function getDate()
    {   
        $page =''; //页数
        $limit = ''; //条数
        $game_date = ''; //比赛年份
        $game_id = ''; //名称赛事
        $city = ''; //举办地
        $user_id = ''; //运动员A
        $user_id2 = ''; //运动员B
        $hand = ''; //执拍手
        $play =''; //打法类型
        $bat = ''; //直横拍
        $game_stage = ''; //比赛阶段
        $game_project = ''; //比赛项目        

        //获得请求(查询条件)
        $condition = Input::get();

        $page .= $condition['page']; //页数
        $limit .= $condition['limit']; //条数
        
        if(array_key_exists('key', $condition))
        {
                     
            $game_date .= $condition['key']['game_date']; //比赛年份
            $game_id .= $condition['key']['game_name']; //名称赛事
            $city .= $condition['key']['city']; //举办地
            $user_id .= $condition['key']['user_id']; //运动员A
            $user_id2 .= $condition['key']['user_id2']; //运动员B
            $hand .= $condition['key']['hand']; //执拍手
            $play .= $condition['key']['play']; //打法类型
            $bat .= $condition['key']['bat']; //直横拍
            $game_stage .= $condition['key']['game_stage']; //比赛阶段
            $game_project .= $condition['key']['game_project']; //比赛项目
            
            $matchs = DB::table('matchs') 
                            ->orwhere('competitions_id',$game_id)
                            ->orwhere('datetime',$game_date)
                            ->orwhere('a_id',$user_id)
                            ->orwhere('b_id',$user_id2)
                            ->get();
            $a = [
                "code" => 0,
                "count" => count($matchs),
                "msg" => '',
                "data" => $matchs,
            ]; 
            return response()->json($a); 

        }
        else
        {
            //向前台发送ajax数据
            //根据赛事id,获得比赛数据
            $matchs = DB::table('matchs') -> get();
            $a = [
                "code" => 0,
                "count" => count($matchs),
                "msg" => '',
                "data" => $matchs,
            ]; 
            return response()->json($a); 
        }

    }
}
