<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入模型
use Illuminate\Support\Facades\DB;
use App\Model\User;
use Illuminate\Support\Facades\Input;
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
            $data = Input::except(['_token']);
            //去除webuploader默认追加的file表单项
            unset($data['file']);
            // $data = Input::except(['file']);
            //写入数据表
            //$result = DB::table('user') -> insert($data);
            $result = User::insert($data);
            //判断
            if($result){
                $response = ['code'=>0,'msg'=>'用户添加成功'];
            }else {
                $response = ['code'=>1,'msg'=>'用户添加失败'];
            }
            //json返回数据
            return response()->json($response);

        }else{
            //get请求方式
            return view('admin.user.add');
           }
            
    }
}
