<?php /*a:1:{s:66:"C:\wamp64\www\tumor\application\admin\view\drug_approval\edit.html";i:1583994009;}*/ ?>
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
    <script type="text/javascript" src="/tumor/public/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/tumor/public/static/admin/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .layui-input-inline{
        width:70% !important;
      }
    </style>

  </head>
  
  <body>
    <div class="x-body">
        <form class="layui-form">
          <input type="hidden" id="record_id" value="<?php echo htmlentities($data['id']); ?>">
          <input type="hidden" name="_method" value="PUT">
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>癌症类型
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="cancer_type" name="cancer_type" required lay-verify="required"
                  autocomplete="off" value="<?php echo htmlentities($data['cancer_type']); ?>" class="layui-input">
              </div>   
          </div>

          <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>癌症亚型
            </label>
            <div class="layui-input-inline">
                <input type="text" id="cancer_subtype" name="cancer_subtype" required lay-verify="required"
                autocomplete="off" value="<?php echo htmlentities($data['cancer_subtype']); ?>" class="layui-input">
            </div>   
          </div>

          <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>药物名称
            </label>
            <div class="layui-input-inline">
                <input type="text" id="drug" name="drug" required lay-verify="required"
                autocomplete="off" value="<?php echo htmlentities($data['drug']); ?>" class="layui-input">
            </div>   
          </div>

          <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>NCCN
            </label>
            <div class="layui-input-inline">
                <input type="text" id="fda_nccn" name="fda_nccn" required lay-verify="required"
                autocomplete="off" value="<?php echo htmlentities($data['fda_nccn']); ?>" class="layui-input">
            </div>   
          </div>

          <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>CFDA
            </label>
            <div class="layui-input-inline">
                <input type="text" id="cfda" name="cfda" required lay-verify="required"
                autocomplete="off" value="<?php echo htmlentities($data['cfda']); ?>" class="layui-input">
            </div>   
          </div>
          
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  修改记录
              </button>
          </div>
      </form>
    </div>
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;

          //监听提交
          form.on('submit(add)', function(data){
            // console.log(data.field);

            data['_method'] = "PUT";

            // 获取记录id
            id = $("#record_id").val();

            let url = "<?php echo url('/admin/approval/'); ?>" + id
            //发异步，把数据提交给php
            $.ajax({
              type:"post",
              url,
              data:data.field,
              dataType:'json',
              success:function(ret){
                if(ret.statu == 0){
                  layer.alert('修改成功', {icon: 6},function () {
                
                
                    // 获得frame索引
                    var index = parent.layer.getFrameIndex(window.name);
                    // 刷新父窗口
                    parent.location.reload();
                    //关闭当前frame
                    parent.layer.close(index);
                  });
                }else{
                  layer.alert('未知错误，修改失败', {icon: 2});
                }
              },
              error: function(){
                layer.alert('未知错误，修改失败', {icon: 2});  
              }
            });

            return false;
          });
          
          
        });
    </script>
  </body>

</html>