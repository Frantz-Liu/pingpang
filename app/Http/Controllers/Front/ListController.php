<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ListController extends Controller
{
    //展示比赛的数据
    public function list(){
        //获取到列表中需要的数据
        $da = DB::table('matchdetails')->get();
        $data = [];
        
        foreach($da as $va){
            //第一组 
            if($va->order_winner == '1' && $va->a_cout == "第三板" || $va->a_cout == "发球")
            {
                // A用户得分
                //a_sc 是a运动员的得分,并不是总分; order_winner  1代表得分 2代表失分
                $data['a_sc'] = isset($data['a_sc']) ? $data['a_sc']+1:1;
            }
            if($va->order_winner == '2' && $va->a_cout == "第三板"|| $va->a_cout =="发球")
            {
                // A用户失分
                //a_scl是a运动员的失分,并不是总失分
                $data['a_scl'] = isset($data['a_scl']) ? $data['a_scl'] + 1 : 1; 
            }
            if($va->order_winner== "1" && $va->b_cout == "第三板"|| $va->b_cout == "发球")
            {
                //判断b运动员得分
                $data['b_sc'] = isset($data['b_sc']) ? $data['b_sc'] +1 :1;
            }
            if($va->order_winner == "1" && $va->b_cout == "第三板" || $va->b_cout == "发球")
            {   
                //b运动员失分
                $data['b_scl'] = isset($data['b_scl']) ? $data['b_scl']+1 : 1;
            }

            //第二组
            if ($va->order_winner == "1" && $va->a_cout == "第四板" || $va->a_cout == "接发球") 
            {
                $data['a_sc'] = isset($data['a_sc']) ? $data['a_sc'] + 1: 1;
            }
            if ($va->order_winner == "2" && $va->a_cout == "第四板" || $va->a_cout== "接发球")
            {
                $data['a_scl'] = isset($data['a_scl']) ? $data['a_scl'] +1 :1;
            }
            if ($va->order_winner == "1" && $va->b_cout == "第四板" || $va->b_cout == "接发球")
            {
                $data['b_sc'] = isset($data['b_sc']) ? $data['b_sc'] +1 : 1;
            }
            if ($va->order_winner == "2" && $va->b_cout == "第四板" || $va->b_cout == "接发球")
            {
                $data['b_scl'] = isset($data['b_scl']) ? $data['b_scl'] +1 :1;
            }
        }
        return response()->json($data);
            //return json_encode($data);
        //var_dump($data);
        //return view('front.list.index');
    }
}
