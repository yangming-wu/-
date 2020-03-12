<?php /*a:1:{s:59:"C:\wamp64\www\tumor\application\admin\view\chemo\index.html";i:1583910183;}*/ ?>
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
    <link rel="stylesheet" href="/tumor/public/static/admin/css/bootstrap.min.css">
    <script src="/tumor/public/static/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/tumor/public/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/tumor/public/static/admin/js/xadmin.js"></script>
  </head>
  
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="/tumor/uploads/demo/LT_chemotherapy_total.xls" download="LT_chemotherapy_total" target="__blank">示例数据表下载</a>
      </span>
      <a class="layui-btn layui-btn-primary layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:38px">ဂ</i></a>
    </div>
    <div class="x-body">
      
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button type="button" class="layui-btn" id="uploadFile"><i class="layui-icon"></i>上传文件</button>
        
        <!-- 搜索 -->
        <div class="x-right" style="width:30%;position: relative;">
          <form action="<?php echo url('/admin/chemotherapy'); ?>" method="GET">
            <input type="text" name="search" id='search' value="<?php echo htmlentities($search); ?>" placeholder="请输入搜索内容..." autocomplete="off"   class="layui-input" style="width:70%;">
            <button type="submit" class="layui-btn layui-btn-normal" style="position: absolute; top:0; right:0; width:30%;">查询</button>  
          </form>
        </div>
        
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>序号</th>
            <th>药物名称</th>
            <th>rs位点</th>
            <th>基因型</th>
            <th>毒性</th>
            <th>疗效</th>
            <th>证据等级</th>
            <th>操作</th>
        </thead>
        <tbody>
          <?php foreach($list as $key => $item): ?>
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo htmlentities($item['id']); ?>'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td><?php echo htmlentities($key + 1); ?></td>
            <td><?php echo htmlentities($item['chemotherapy']); ?></td>
            <td><?php echo htmlentities($item['rs_site']); ?></td>
            <td><?php echo htmlentities($item['genotype']); ?></td>
            <td><?php echo htmlentities($item['toxicity']); ?></td>
            <td><?php echo htmlentities($item['efficacy']); ?></td>
            <td><?php echo htmlentities($item['evidence']); ?></td>
            <td class="td-manage">
              <!-- <a title="编辑"  onclick="x_admin_show('编辑','admin-edit.html')" href="javascript:;">
                <i class="layui-icon">&#xe642;</i>
              </a>
              <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a> -->
            <button class="layui-btn layui-btn-normal layui-btn-sm" onclick="x_admin_show('编辑','<?php echo url('/admin/chemotherapy/'); ?>' + '<?php echo htmlentities($item['id']); ?>/edit')">编辑</button>
              <button class="layui-btn layui-btn-danger layui-btn-sm" onclick="member_del(this,<?php echo htmlentities($item['id']); ?>)">删除</button>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <!-- 分页 -->
      <?php echo $list; ?> 
     
    </div>

    <!-- js -->
<script>
layui.use('upload', function(){
  var $ = layui.jquery
  ,upload = layui.upload;

  let url = "<?php echo url('/admin/chemotherapy/upload'); ?>";
  //指定允许上传的文件类型
  upload.render({
    elem: '#uploadFile',
    url,
    field:'uploadFile',
    accept: 'file', //普通文件
    exts: 'xls', //只允许上传压缩文件
    done: function(res){ // 上传成功
      if(res.statu == 0){
        // 文件上传成功, 刷新当前页面
        location.replace(location.href)
        layer.msg(res.msg , {icon: 1});
      }else{
        layer.msg(res.msg, {icon: 2});
      }
      
    },
    error: function(){ // 上传失败
      layer.msg('未知错误,文件上传失败' , {icon: 2});
    }
  });
})

</script>
  


<script>
  // 删除单项
  function member_del(obj,id){
    let url = "<?php echo url('/admin/chemotherapy/'); ?>" + id

    layer.confirm('确认要删除吗？',function(index){
          //发异步删除数据
          $.ajax({
            url,
            type:'DELETE',
            success:function (ret) {
              $(obj).parents("tr").remove();
              layer.msg(ret.msg,{icon:1,time:1000});
            }
          })
      });
  }

  // 批量删除
  function delAll (argument){
    var data = tableCheck.getData();
    
    // 判断是否选中记录
    if(data.length == 0){
      console.log(data);
      layer.msg('请选择要删除的记录!', {icon: 2});
      return false;
    }

    let url = "<?php echo url('/admin/chemotherapy/delAll'); ?>"
    // console.log(url)

    layer.confirm('确认要全部删除吗？',function(index){
        //捉到所有被选中的，发异步进行删除
        del_ids = data.join();
        $.ajax({
          url,
          type: 'post',
          data: {'ids': del_ids},
          dataType:'json',
          success:function(ret){
            if(ret.statu == 0){
              layer.msg('删除成功', {icon: 1});
              $(".layui-form-checked").not('.header').parents('tr').remove();
            }else{
              layer.msg('未知错误,删除失败', {icon: 1});
            }
          },
          error:function(e){
            layer.msg('删除失败: ' + e, {icon: 1});  
          }
        })
    });
  }

</script>
    
  </body>

</html>