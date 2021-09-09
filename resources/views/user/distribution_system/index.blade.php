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
    <form action="{{ route('user.distribution_system.index') }}" method="get">
        <input type="text" name="id" placeholder="用户ID">
        <input type="submit" value="检索">
    </form>
    <table>
        <div id="html"></div>
    </table>
</body>
</html>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    var userInfo = jQuery.parseJSON('<?php echo $userInfo;?>');
    var html;
    html += `<tr>
                <th>ID</th>
                <th>上级ID</th>
                <th>名称</th>
            </tr>`
    getHtml(userInfo);
    function getHtml(userInfo) {
        if (userInfo.length > 0) {
            // statement
            $.each(userInfo, function(index, item){
                html += '<tr style="width:300px;text-align:center">'
                    + '<td>'+item.id+'</td>'
                    + '<td>'+item.parent_id+'</td>'
                    + '<td>'+item.name+'</td>'
                    + '</tr>'
                if (item.next_user.length > 0) {
                    getHtml(item.next_user);
                }
            })
        }
    }
    $('#html').html(html);
</script>