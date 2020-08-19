<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Document</title>
</head>
<body>
    <p>这是首页</p>
    <?php foreach( $data as $v) { ?>
    <ul>
        <li>Name: <?php echo $v['name'] ?></li>
        <li>Age: <?php echo $v['age'] ?></li>
        <li>Gender: <?php echo $v['gender'] ?></li>
    </ul>
    <?php } ?>
    <a href="index.php/teach/log/add">添加日志</a>
</body>
</html>