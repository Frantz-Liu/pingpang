<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>比赛详情管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理中心 <span class="c-gray en">&gt;</span> 比赛详情 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="{{route('matchdetails_add')}}" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加比赛详情 </a></span> <span class="r">共有数据：<strong>{{ $winnerName -> count() }}</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="10"><input type="checkbox" name="" value=""></th>
				<th width="60">赛事名称</th>
				<th width="50">比赛项目</th>
				<th width="40">比赛轮次</th>
				<th width="40">局数</th>
				<th width="50">运动员A</th>
				<th width="50">运动员B</th>
				<th width="50">发球方</th>
				<th width="40">A得分</th>
				<th width="40">B得分</th>
				<th width="40">A拍数</th>
				<th width="40">B拍数</th>
				<th width="50">A手段</th>
				<th width="50">B手段</th>
				<th width="40">得分方</th>
				<th width="40">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($matchName as $val_1)
			@foreach($athleteB as $val_2)
			@foreach($serverName as $server)
			@foreach($winnerName as $winner)			
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>			
				<td>{{$val_1 -> competitions_name}}</td><!-- 赛事名称 -->
				<td>{{$val_1 -> event}}</td><!-- 比赛项目 -->
				<td>{{$val_1 -> round}}</td><!-- 比赛轮次 -->		
				<td>{{$val_2 -> game}}</td><!-- 局数 -->			
				<td>{{$val_1 -> name}}</td><!-- A运动员 -->
				<td>{{$val_2 -> name}}</td><!-- B运动员 -->
				<td>{{$server -> name}}</td><!-- 发球方 -->
				<td>{{$val_2 -> a_score}}</td><!-- A得分 -->
				<td>{{$val_2 -> b_score}}</td><!-- B得分 -->
				<td>{{$val_2 -> a_cout}}</td><!-- A拍数 -->
				<td>{{$val_2 -> b_cout}}</td><!-- B拍数 -->
				<td>{{$val_2 -> a_method}}</td><!-- A手段 -->
				<td>{{$val_2 -> b_method}}</td><!-- B手段 -->
				<td>{{$winner -> name}}</td><!-- 得分方 -->
				<td class="td-manage">			
					<a title="编辑" href="{{route('matchdetails_edit')}}?id={{$winner -> id}}" class="ml-5" style="text-decoration:none">
						<i class="Hui-iconfont">&#xe6df;</i>
					</a> 
					<a title="删除" href="{{route('matchdetails_delete')}}?id={{$winner -> id}}" class="ml-5" style="text-decoration:none">
						<i class="Hui-iconfont">&#xe6e2;</i>
					</a>
				</td>
			</tr>
			@endforeach
			@endforeach
			@endforeach
			@endforeach
		</tbody>
	</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0]}// 制定列不参与排序
		]
	});	
});
</script> 
</body>
</html>