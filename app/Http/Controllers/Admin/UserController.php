<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入模型
use App\Model\User;
use Input;
class UserController extends Controller
{
    //运动员列表
    public function index(){
        //获取数据
        $data = User::all();
        //展示视图,携带数据
        return view('admin.user.index',compact('data'));
    }
    public function add(){
        //判断请求方式(前面需要引入input)
        if(Input::method()=='POST'){
            //post请求
            //数据验证
            $data = Input::expect(['_token']);
            $result = User::insert($data);


        }else{
            //get请求方式
//            if($result){
//
//            }
            return view('admin.user.add');
        }
    }
}
