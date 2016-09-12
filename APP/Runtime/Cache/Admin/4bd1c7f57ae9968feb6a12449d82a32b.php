<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>添加分类</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="apple-mobile-web-app-title" content="Amaze UI" />
<link rel="stylesheet" href="../Public/assets/css/amazeui.min.css"/>
<link rel="stylesheet" href="../Public/assets/css/admin.css">
<script language="javascript" type="text/javascript" src="__PUBLIC__/My97DatePicker/WdatePicker.js"></script>
<link rel="stylesheet" href="__PUBLIC__/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="__PUBLIC__/kindeditor/kindeditor-all-min.js"></script>
<script charset="utf-8" src="__PUBLIC__/kindeditor/lang/zh-CN.js"></script>
<script charset="utf-8" src="__PUBLIC__/jquery.js"></script>
<script type="text/javascript">
  KindEditor.ready(function(K) {
        var editor = K.editor({
          allowFileManager : true
        });
        K('#upload').click(function() {
          editor.loadPlugin('image', function() {
            editor.plugin.imageDialog({
              showRemote : false,
              imageUrl : K('#picpath').val(),
              clickFn : function(url, title, width, height, border, align) {
                K('#picpath').val(url);
                editor.hideDialog();
              }
            });
          });
        });
  });
</script>
</head>
<body>
<!-- content start -->
<form class="am-form" action="<?php echo U(GROUP_NAME.'/TimeManage/addTimeHandle');?>" method="post">
  <div class="admin-content-body">
    <div class="am-cf am-padding am-padding-bottom-0">
      <div class="am-fl am-cf"> <strong class="am-text-primary am-text-lg">时光管理</strong> / <small>添加时光</small> </div>
    </div>
    <hr>
    <div class="am-tabs am-margin" data-am-tabs>
      <ul class="am-tabs-nav am-nav am-nav-tabs">
        <li class="am-active"><a href="#tab1">Add Time</a></li>
      </ul>
      <div class="am-tabs-bd">
        <div class="am-tab-panel am-fade am-in am-active" id="tab1">
          
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-4 am-u-md-2 am-text-right"> 时光图片: </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end">
                <input type="text" name="picpath" id="picpath" class="am-input-sm">
              </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end">
                <input type="button" id="upload" value="选择图片" />（本地上传）
              </div>
            </div>
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-4 am-u-md-2 am-text-right"> 添加时间: </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end">
                <input type="text" name="time" class="am-input-sm" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})">
              </div>
            </div>
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-4 am-u-md-2 am-text-right"> 记录点滴: </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end">
                <textarea rows="6" name="content"></textarea>
              </div>
            </div>
          
        </div>
      </div>
    </div>
    <div class="am-margin">
      <button type="submit" class="am-btn am-btn-primary am-btn-xs">确认添加</button>
    </div>
  </div>
  </form>
  <footer class="admin-content-footer">
    <hr>
    <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
  </footer>
</div>
<!-- content end -->

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a> 
<script src="../Public/assets/js/jquery.min.js"></script> 
<!--<![endif]--> 
<script src="../Public/assets/js/amazeui.min.js"></script> 
<script src="../Public/assets/js/app.js"></script>
</body>
</html>