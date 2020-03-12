<?php /*a:1:{s:59:"C:\wamp64\www\tumor\application\admin\view\login\index.html";i:1583465288;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>账号登录</title>
<link rel="shortcut icon " type="images/x-icon" href="/tumor/public/favicon.ico">
<link rel="stylesheet" type="text/css" href="/tumor/public/static/admin/css/login.css">
</head>
<body>
<div id="wrapper" class="login-page">
<div id="login_form" class="form" >

<form class="login-form" action="<?php echo url('admin/login/index'); ?>" method="POST">
    <h2>管理登录</h2>
    <input type="text" placeholder="用户名" value="admin" name="username" />
    <input type="password" placeholder="密码" name="password" />
    
    <!-- 验证码 -->
    <div style="position: relative;">
        <input type="text" placeholder="验证码" name="vcode">
        <img src="<?php echo captcha_src(); ?>" id="vcode" style="display:inline-block;position: absolute; top:0;right: 0;">
    </div>
    
    <button id="login" type="submit">登　录</button>
    <div style="margin-top:10px;font-size:12px;">
        <?php if(session('?error')): ?>
            <span style="color: red;"><?php echo session('error'); ?></span>
        <?php endif; ?>
    </div>
</form>
</div>
</div>

<script src="/tumor/public/static/admin/js/jquery.min.js"></script>
<script>
    // 点击更新验证码图片
    $('#vcode').click(function(){
        // console.log(this)
        let src = $(this).attr('src') + '?vt=' + Math.random()
        $(this).attr('src', src)
    })
</script>

</body>
</html>