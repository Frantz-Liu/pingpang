<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理员管理</title>
</head>
<body>
    <table>
        <tr>
            <td>id</td>
            <td>用户名</td>
            <td>密码</td>
            <td>姓名</td>
            <td>性别</td>
            <td>手机号</td>
            <td>Email</td>
            <td>用户状态</td>
            <td>编辑 <a href="{{route('manager_add')}}">添加管理员</a></td>
        </tr>
        @foreach($manager as $val)
        <tr>
            <td>{{$val -> id}}</td>
            <td>{{$val -> username}}</td>
            <td>{{$val -> password}}</td>
            <td>{{$val -> name}}</td>
            <td>{{$val -> gender}}</td>
            <td>{{$val -> mobile}}</td>
            <td>{{$val -> email}}</td>
            <td>
                @if(($val->status) === '1')
                可用
                @else
                不可用
                @endif
            </td>
            <td><a href="{{route('manager_edit')}}">修改</a>|<a href="{{route('manager_delete')}}">删除</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>