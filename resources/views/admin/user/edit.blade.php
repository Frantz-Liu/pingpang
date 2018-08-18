<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>添加用户 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	@foreach ($res as $res)
	<form action="" method="post" class="form form-horizontal" id="form-member-add" >
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" readonly="readonly" disabled="" value="{{$res->name}}" placeholder="" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="gender" type="radio" id="gender-1"  @if(($res->gender) === '男') checked @endif value = '男' >
					<label for="gender-1">男</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="gender-2" value = '女' name="gender"  @if(($res->gender) === '女') checked @endif>
					<label for="gender-2">女</label>
				</div>
			</div>
		</div>
		<!-- 国家 input输入框 ,是否需要修改为联动 -->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>国家：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$res->country}}" placeholder="" id="country" name="country">
			</div>
		</div>
		<!-- 年龄 -->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>年龄：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$res->age}}" placeholder="" id="age" name="age">
			</div>
		</div>
		<!-- 执手拍 -->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">执拍手:</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<span class="select-box">
					<select class="select" size="1" name="racket_hand">
						<!-- <option value="" selected>请选择手势</option> -->
						<option value="左手"  @if(($res->racket_hand) === '左手') selected @endif>左手</option>
						<option value="右手"  @if(($res->racket_hand) === '右手') selected @endif>右手</option>
					</select>
				</span> 
			</div>
		</div>
		<!-- 直横拍 -->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">直横拍:</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<span class="select-box">
					<select class="select" size="1" name="grip">
						<!-- <option value="" selected>请选择</option> -->
						<option value="直拍" @if(($res->grip) === '直拍') selected @endif>直拍</option>
						<option value="横拍" @if(($res->grip) === '横拍') selected @endif>横拍</option>
					</select>
				</span> 
			</div>
		</div>
		<!-- 打法 -->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>打法:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$res->style}}" placeholder="" id="style" name="style">
			</div>
		</div>
		{{csrf_field()}}
		<!-- 提交按钮 -->
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				<a href="{{route('user_index')}}"class="btn btn-warning radius">&nbsp;&nbsp;取消&nbsp;&nbsp;</a>
			</div>
		</div>
	</form>
	@endforeach
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-member-add").validate({
		rules:{
			name:{
				required:true,
				minlength:2,
				maxlength:16
			},
			gender:{
				required:true,
			},
			// mobile:{
			// 	required:true,
			// 	isMobile:true,
			// },
			// email:{
			// 	required:true,
			// 	email:true,
			// },
			// uploadfile:{
			// 	required:true,
			// },
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			//$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			//parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>