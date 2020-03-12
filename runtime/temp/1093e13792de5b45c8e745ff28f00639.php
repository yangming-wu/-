<?php /*a:1:{s:59:"C:\wamp64\www\tumor\application\admin\view\index\index.html";i:1583983781;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理系统</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/tumor/public/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/tumor/public/static/admin/css/font.css">
	<link rel="stylesheet" href="/tumor/public/static/admin/css/xadmin.css">
	
    <script src="/tumor/public/static/admin/js/jquery.min.js"></script>
    <script src="/tumor/public/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/tumor/public/static/admin/js/xadmin.js"></script>

</head>
<body>
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="<?php echo url('admin/index/index'); ?>">肿瘤数据库后台</a></div>
        <div class="left_open">
            <i title="展开左侧栏" class="iconfont">&#xe699;</i>
        </div>
        <ul class="layui-nav left fast-add" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">+新增</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
               <dd><a onClick="x_admin_show('用户','http://www.baidu.com')"><i class="iconfont">&#xe6b8;</i>用户</a></dd>
            </dl>
          </li>
        </ul>
        <ul class="layui-nav right" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;"><?php echo htmlentities($user); ?></a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onClick="x_admin_show('个人信息','http://www.baidu.com')">个人信息</a></dd>
              <dd><a href="<?php echo url('admin/index/logout'); ?>">注销登录</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item to-index"><a target="__blank" href="http://120.77.144.112/RiFS/index.html">RiFS系统</a></li>
        </ul>
        
    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
     <!-- 左侧菜单开始 -->
    <div class="left-nav">
      <div id="side-nav">
        <ul id="nav">
            <li class="open">
              <a href="javascript:;">
                <i class="iconfont">&#xe6eb;</i>
                <cite>肿瘤数据库</cite>
                <i class="iconfont nav_right">&#xe6a7;</i>
              </a>
              <ul class="sub-menu" style="display: block;">
                <!-- <li><a onclick="layer.msg('靶向用药数据未开放' , {icon: 2})"><i class="iconfont">&#xe6a7;</i><cite>靶向用药</cite></a></li > -->
                <li><a _href="<?php echo url('/admin/immunotherapy'); ?>"><i class="iconfont">&#xe6a7;</i><cite>免疫用药</cite></a></li >
                <li><a _href="<?php echo url('/admin/immuno_other'); ?>"><i class="iconfont">&#xe6a7;</i><cite>其它免疫</cite></a></li >
                <li><a _href="<?php echo url('/admin/chemotherapy'); ?>"><i class="iconfont">&#xe6a7;</i><cite>化疗用药</cite></a></li >
                <li><a _href="<?php echo url('/admin/clinicaltrial'); ?>"><i class="iconfont">&#xe6a7;</i><cite>临床实验</cite></a></li >
                <li><a _href="<?php echo url('/admin/approval'); ?>"><i class="iconfont">&#xe6a7;</i><cite>药物获批</cite></a></li >
              </ul>
            </li>
            
            <!-- 第三方数据库传送门 -->
            <li>
              <a href="javascript:;">
                <i class="iconfont"></i>
                <cite>数据库传送</cite>
                <i class="iconfont nav_right">&#xe6a7;</i>
              </a>
              <ul class="sub-menu" >
                <li><a  _href="##" href="https://www.ncbi.nlm.nih.gov/snp/" target="__blank"><i class="iconfont">&#xe6a7;</i><cite>NCBI dbSNP</cite></a></li >
                <li><a  _href="##" href="https://www.ncbi.nlm.nih.gov/clinvar/" target="__blank"><i class="iconfont">&#xe6a7;</i><cite>NCBI ClinVar</cite></a></li >
                  <li><a  _href="##" href="http://wintervar.wglab.org" target="__blank"><i class="iconfont">&#xe6a7;</i><cite>InterVar</cite></a></li >
              </ul>
            </li>
        </ul>
      </div>
    </div>
    <!-- <div class="x-slide_left"></div> -->
    <!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
          <ul class="layui-tab-title">
            <li class="home"><i class="layui-icon">&#xe68e;</i>我的桌面</li>
          </ul>
          <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='<?php echo url("admin/index/welcome"); ?>' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
          </div>
        </div>
    </div>
    <div class="page-content-bg"></div>
    <!-- 右侧主体结束 -->
    <!-- 中部结束 -->
    <!-- 底部开始 -->
    <!--<div class="footer">
        <div class="copyright">Copyright ©2019 L-admin v2.3 All Rights Reserved</div>  
    </div>-->
    <!-- 底部结束 -->
</body>
</html>