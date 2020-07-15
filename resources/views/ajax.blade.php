<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ajax</title>
    {{--    为前端资源生成一个url地址--}}
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
</head>
<body>
    用户名：<input type="text" name="name" id="name">
    年龄：<input type="text" name="age" id="age">
    <input type="button" name="btn" id="btn" value="点击">

    <script type="text/javascript">
        $('#btn').click(function(){
            $.ajax({
                url:'/response/ajax',
                dataType:'json',
                success:function(data){
                    $("#name").val('name');
                    $("#age").val('age');
                }
            })
        });
    </script>

</body>
</html>