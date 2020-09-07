<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
这是我的首页1
<?php foreach( $data as $k=>$v){?>
<ul>
    <li>姓名：<?php echo$v["name"]?></li>
    <li>年龄：<?php echo$v["age"]?></li>
    <li>性别：<?php echo$v["sex"]?></li>
</ul>
<?php } ?>
</body>
</html>