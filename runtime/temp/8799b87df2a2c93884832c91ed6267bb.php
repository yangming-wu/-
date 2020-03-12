<?php /*a:1:{s:61:"C:\wamp64\www\tumor\application\admin\view\index\welcome.html";i:1583979498;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-L-admin1.0</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="shortcut icon" href="/tumor/public/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="/tumor/public/static/admin/css/font.css">
        <link rel="stylesheet" href="/tumor/public/static/admin/css/xadmin.css">
        <script src="/tumor/public/static/admin/js/jquery.min.js"></script>
    </head>
    <body>
    <div class="x-body layui-anim layui-anim-up">
        <blockquote class="layui-elem-quote">欢迎管理员：
            <span class="x-red"><?php echo htmlentities($data['user']); ?></span>！当前时间: <span id="ctime"></span></blockquote>
        <fieldset class="layui-elem-field">
            <legend>数据统计</legend>
            <div class="layui-field-box">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body">
                            <div class="layui-carousel x-admin-carousel x-admin-backlog" lay-anim="" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 90px;">
                                <div carousel-item="">
                                    <ul class="layui-row layui-col-space10 layui-this">
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>靶向用药</h3>
                                                <p>
                                                    <cite style="color:red;">0</cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>免疫用药</h3>
                                                <p>
                                                    <cite><?php echo htmlentities($data['immuno']); ?></cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>化疗用药</h3>
                                                <p>
                                                    <cite><?php echo htmlentities($data['chemo']); ?></cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>临床实验</h3>
                                                <p>
                                                    <cite><?php echo htmlentities($data['clin']); ?></cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>药物获批</h3>
                                                <p>
                                                    <cite><?php echo htmlentities($data['drug']); ?></cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs2">
                                            <a href="javascript:;" class="x-admin-backlog-body">
                                                <h3>其它免疫</h3>
                                                <p>
                                                    <cite><?php echo htmlentities($data['other']); ?></cite></p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统通知</legend>
            <div class="layui-field-box">
                <table class="layui-table" lay-skin="line">
                    <tbody>
                        <tr>
                            <td >
                                <a class="x-a" >新版肿瘤用药数据库 2.0上线了</a>
                            </td>
                        </tr>
                        <tr>
                            <td >
                                <a class="x-a" >邮箱:(bio1@topgen.cn)</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>系统信息</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>xxx版本</th>
                            <td>1.0.180420</td></tr>
                        <tr>
                            <th>服务器地址</th>
                            <td>#</td></tr>
                        <tr>
                            <th>操作系统</th>
                            <td>Linux</td></tr>
                        <tr>
                            <th>运行环境</th>
                            <td>Apache/2.4.23 (Win32) OpenSSL/1.0.2j mod_fcgid/2.3.9</td></tr>
                        <tr>
                            <th>PHP版本</th>
                            <td>5.6.27</td></tr>
                        <tr>
                            <th>PHP运行方式</th>
                            <td>cgi-fcgi</td></tr>
                        <tr>
                            <th>MYSQL版本</th>
                            <td>5.5.53</td></tr>
                        <tr>
                            <th>ThinkPHP</th>
                            <td>5.1</td></tr>
                        <tr>
                            <th>上传附件限制</th>
                            <td>2M</td></tr>
                        <tr>
                            <th>执行时间限制</th>
                            <td>30s</td></tr>
                        <tr>
                            <th>剩余空间</th>
                            <td>86015.2M</td></tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <fieldset class="layui-elem-field">
            <legend>开发团队</legend>
            <div class="layui-field-box">
                <table class="layui-table">
                    <tbody>
                        <tr>
                            <th>版权所有</th>
                            <td>cdnuti(xuebingsi)
                                <a href="http://#/" class='x-a' target="_blank">访问官网</a></td>
                        </tr>
                        <tr>
                            <th>开发者</th>
                            <td>(bio1@topgen.cn)</td></tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <blockquote class="layui-elem-quote layui-quote-nm">感谢layui,百度Echarts,jquery,本系统由L-admin提供技术支持。</blockquote>
    </div>
   
    <script>

        function getTime(){
            let now = new Date();
            let year = now.getFullYear(); // 年
            let month = (now.getMonth() + 1).toString().padStart(2, '0');   // 月
            let day = now.getDate().toString().padStart(2, '0');      // 日
            let hours = now.getHours().toString().padStart(2, '0');   // 小时
            let min = now.getMinutes().toString().padStart(2, '0');   // 分钟
            let sec = now.getSeconds().toString().padStart(2, '0');   // 秒

            let ctime = `${year}-${month}-${day} ${hours}:${min}:${sec}`
            
            $("#ctime").html(ctime);
        }

        // 页面加载完成
        $(function(){
            getTime();
            // 创建定时器
            setInterval(getTime, 1000);
        })


    </script>


    </body>
</html>