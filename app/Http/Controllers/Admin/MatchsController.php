<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入Db类
use Illuminate\Support\Facades\DB;
//引入input类
use Illuminate\Support\Facades\Input;



class MatchsController extends Controller
{
    //赛事数据列表
    public function index(){
        //获取数据库matchs中的数据
        $data = DB::table('matchs')->get();
        $name = DB::table('matchs')
        ->join('user','matchs.a_id','=','user.id')
        ->select('user.name')
        ->get();
        
        //var_dump($data);
        //展示视图,并将数据传到前端页面
        return view('admin.matchs.index',compact('data','name'));
    }
    public function delete(){
        //删除
        $id = Input::get('id');
        $res = DB::table('matchs')->where('id','=',$id)->delete();
        if($res){
            //删除成功重定向到列表
            return  redirect('admin/matchs/index');
            
        }else{
            $response = ['code'=>1,'msg'=>'用户添加失败'];
        }
        
    }

}
