<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <div>
        <a href="{{ route('user.home') }}">注册</a>
        <a href="{{ route('user.integral_config.index') }}">积分配置</a>
        <a href="{{ route('user.distribution_system.index') }}">分销</a>
    </div>
    <form action="{{route('user.register')}}" method="post">
        @csrf
        <div>
            <input type="text" name="parent_id" value="{{old('parent_id')}}" placeholder="上级ID">
            <p>{{$errors->first('parent_id')}}</p>
            <input type="text" name="name" value="{{old('name')}}" placeholder="用户名称">
            <p>{{$errors->first('name')}}</p>
            <input type="submit" value="注册">
        </div>
    </form>
</body>
</html>