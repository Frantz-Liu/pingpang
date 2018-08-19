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
    //添加
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
                return  redirect('admin/user/index');
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

    //删除
    public function delete(){
        // 接受前端要删除的数据
		$id = Input::get('id');
        $res = DB::table('user')->where('id','=',$id)->delete();
        if($res){
            //删除成功重定向到列表
            return  redirect('admin/user/index');
            
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
            $result = DB::table('user')->where('id','=',$data['id'])->update($data);
            return  redirect('admin/user/index');
        }else{
            //get方式请求
             $id = Input::get('id');
            // //根据get传递的id获取数据表中的数据
            $res = DB::table('user')->where('id','=',$id)->get(); 
            //展示视图,携带数据
            return view('admin.user.edit',compact('res'));
        }
    }
}
