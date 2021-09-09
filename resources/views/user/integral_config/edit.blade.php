<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <form action="{{ route('user.integral_config.update') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $integralConfig->id }}">
        <div>
            等级：<select name="level">
                    @foreach(config('common.level') as $k => $v)
                        <option value="{{ $k }}" @if($k == old('level',$integralConfig->level)) selected @endif>{{ $v }}</option>
                    @endforeach
                </select>
                <p style="color:red">{{ $errors->first('level') }}</p>
            积分金额：<input type="text" name="amount" value="{{ (int)old('amount', $integralConfig->amount) }}">
                <p style="color:red">{{ $errors->first('amount') }}</p>
                <input type="submit" value="更新">
        </div>
    </form>
</body>
</html>