<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>模板</title>
</head>
<body>

<form action="/user/edit/4" method="post">
    {{csrf_field()}}
    用户名：<input type="text" name="name" value="22">
    密码：<input type="text" name="password" value="33">
    <input type="submit" name="btn" value="提交">
</form>

</body>
</html>