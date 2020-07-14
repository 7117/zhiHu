<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>模板</title>
</head>
<body>
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
</body>
</html>