<?php /*a:1:{s:64:"F:\www\class\web69\tp5.1\application\index\view\index\index.html";i:1541575099;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlentities($webname); ?></title>
</head>
<body>
    <h3>PHP我的最爱</h3>
    <h3>我是一个变量：<?php echo htmlentities($aa); ?></h3>
    <hr>
    <ul>
        <li>id:<?php echo htmlentities($arr['id']); ?></li>
        <li>姓名：<?php echo htmlentities($arr['name']); ?></li>
    </ul>
    <div>加密：<?php echo htmlentities(md5($code)); ?></div>
    <div>加密：<?php echo webmd5($code); ?></div>
    <script>
        <!--原样输出-->
        
        let json = {'name':'{$code}'}
        
    </script>
</body>
</html>