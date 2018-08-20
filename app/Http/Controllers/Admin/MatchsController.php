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
        // $name = DB::table('matchs')
        // ->join('user','matchs.a_id','=','user.id')
        // ->select('user.name')
        // ->get();
        
        // $name1 = DB::table('matchs')
        // ->join('user','matchs.b_id','=','user.id')
        // ->select('user.name')
        // ->get();

        
        //左连接获取运动员A的数据
        //$data = DB::table('matchs as a1') ->select('a1.*','a2.name as userA')
       // ->leftJoin('user as a2','a1.a_id','=','a2.id')
        //->leftJoin('competitions as a2','a1.competitions_id','=','a2.id')
       // ->get();//运动员A
        
        //运动员B
        // $name = DB::table('matchs')
        // ->join('user','matchs.b_id','=','user.id')//连表获取运动员B名
        // ->join('competitions','matchs.competitions_id','=','competitions.id')//获取赛事表中的赛事名;
        // ->select('user.name','competitions.competitions_name')
        // ->get();
        
        // //获胜方
        // $names = DB::table('matchs')
        // ->join('user','matchs.winner_id','=','user.id')
        // ->select('user.name')
        // ->get();

        // $cmp = DB::table('matchs')
        // ->join('competitions','matchs.competitions_id','=','competitions.id')
        // ->select('competitions.competitions_name')
        // ->get();
        //var_dump($name);
        //展示视图,并将数据传到前端页面
        return view('admin.matchs.index',compact('data'));
        // return view('admin.matchs.index',compact('data','name','names'));
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
    //修改
    public function edit(){
        //判断请求方式
        if (Input::method() == 'POST') {
            //POST方式请求
            $data = Input::except(['_token']);
            $result = DB::table('matchs')->where('id','=',$data['id'])->update($data);
            return  redirect('admin/matchs/index');
        }else{
            //get方式请求
             $id = Input::get('id');
            // //根据get传递的id获取数据表中的数据
            $res = DB::table('matchs')->where('id','=',$id)->get(); 
            //展示视图,携带数据
            return view('admin.matchs.edit',compact('res'));
        }
    }






    //添加数据
    public function add(){
        //判断请求方式(前面需要引入input)
        if(Input::method()=='POST'){
            //post请求
            //数据验证
            $data = Input::except(['_token']);
            //去除webuploader默认追加的file表单项
            //unset($data['file']);
            // $data = Input::except(['file']);
            //写入数据表
            $result = DB::table('matchs') -> insert($data);
            // var_dump($result);
            //判断
            if($result){
               // $response = ['code'=>0,'msg'=>'用户添加成功'];
                return  redirect('admin/matchs/index');
            }else {
                $response = ['code'=>1,'msg'=>'用户添加失败'];
            }
            //json返回数据
            return response()->json($response);
            
        }else{
            //get请求方式
            return view('admin.matchs.add');
           }
            

        }

}
