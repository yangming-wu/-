<?php /*a:1:{s:61:"F:\www\class\web69\tp5.1\application\index\view\wudi\add.html";i:1541585384;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>表单数据提交</title>
</head>
<body>
<form action="<?php echo url('index/wudi/addsave'); ?>" method="post">
    <p>
        <input type="text" name="title" id="">
    </p>
    <p>
        <input type="text" name="desn" id="">
    </p>
    <p>
        <input type="text" name="body" id="">
    </p>
    <p>
        <input type="text" name="sex" id="">
    </p>
    <p>
        <input type="submit" value="提交数据">
    </p>
</form>
</body>
</html>