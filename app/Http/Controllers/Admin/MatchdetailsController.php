<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MatchdetailsController extends Controller
{
    //展示比赛详情数据
    public function index()
    {
        $matchName = DB::table('matchdetails')
                            ->join('matchs','matchdetails.match_id','=','matchs.id') //哪场比赛
                            ->join('competitions','competitions_id','=','competitions.id') //哪场赛事
                            ->join('user','matchs.a_id','=','user.id') //运动员A
                            //赛事名称,比赛项目,比赛轮次,运动员A
                            ->select('competitions.competitions_name','matchs.event','matchs.round','user.name')
                            ->get();
        $athleteB = DB::table('matchdetails')
                            ->join('matchs','matchdetails.match_id','=','matchs.id') //哪场比赛
                            ->join('user','matchs.b_id','=','user.id') //运动员B
                            //运动员B,局数,A得分,B得分,A拍数,B拍数,A方法,B方法
                            ->select('user.name','matchdetails.game','matchdetails.a_score','matchdetails.b_score','matchdetails.a_cout','matchdetails.b_cout','matchdetails.a_method','matchdetails.b_method')
                            ->get();
        $serverName = DB::table('matchdetails')
                            ->join('user','matchdetails.server_id','=','user.id')
                            ->select('user.name') //发球方姓名
                            ->get();
        $winnerName = DB::table('matchdetails')
                            ->join('user','matchdetails.order_winner','=','user.id')
                            ->select('user.name','matchdetails.id') //获胜方姓名,细节id
                            ->get();
        return view('admin.matchdetails.index',compact('matchName','athleteB','serverName','winnerName'));
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
