<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>模板</title>
</head>
<body>

<form action="/user/add" method="post">
    用户名：<input type="text" name="name">
    <input type="submit" name="btn" value="提交">
</form>


<hr>

<h1>原始用法</h1>
<hr>
<?php echo time();?>
<hr>
{{time()}}
<h1>使用遍历</h1>
@foreach ($data as $v)
    {{$v['name']}}-----{{$v['age']}}
    <br>
@endforeach

<hr>

<?php foreach($data as $k=>$v): ?>
<?php echo $v['name'];?>----<?php echo $v['age'];?>
<br>
<?php endforeach;?>
</body>
</html>