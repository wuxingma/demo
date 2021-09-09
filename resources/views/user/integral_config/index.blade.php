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
    <div>
        <table>
            <tr>
                <th>等级</th>
                <th>积分金额</th>
                <th>操作</th>
            </tr>
            @foreach($integralConfig as $index => $item)
            <tr>
                <td>{{config('common.level')[$item->level] ?? ''}}</td>
                <td>{{$item->amount}}</td>
                <td><a href="{{route('user.integral_config.edit', ['id' => $item->id])}}">编辑</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>