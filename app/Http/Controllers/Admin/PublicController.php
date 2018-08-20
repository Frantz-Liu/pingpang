<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入Auth门面
use Auth;

class PublicController extends Controller
{
    //展示页面
    public function login(){
        //展示页面
        return view('admin.public.login');
    }
    public function check(Request $request){
        //开始自动验证
        $this->validate($request,[
            //验证规则
            'username' => 'required|min:3|max:20',
            'password' => 'required|min:6',
            'captcha'  => 'required|size:5|captcha'
        ],[
            //针对没有翻译的错误提示
            'captcha.required' => '验证码不能为空',
            'captcha.size'     => '验证码长度必须是5位',
            'captcha.captcha'  => '验证码错误'
        ]);
        //开始进行身份合法性验证
        $data = $request -> only(['username','password']);
        $data['status'] = '2'; //2表示状态为正常帐号
        //Auth认证
        if(Auth::guard() -> attempt($data,$request -> get('online'))){
        //if(Auth::guard() -> attempt($request -> get('online'))){
            //验证通过
            return redirect(route('dashboard'));
        }else{
            //验证失败
            return redirect(route('login')) -> withErrors(['error' => '用户名或密码错误!']);
        }
    
    }
}
