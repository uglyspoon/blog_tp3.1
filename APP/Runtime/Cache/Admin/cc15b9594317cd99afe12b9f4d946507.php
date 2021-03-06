<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>添加角色</title>
<meta name="description" content="这是一个form页面">
<meta name="keywords" content="form">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="icon" type="image/png" href="../Public/assets/i/favicon.png">
<link rel="apple-touch-icon-precomposed" href="../Public/assets/i/app-icon72x72@2x.png">
<meta name="apple-mobile-web-app-title" content="Amaze UI" />
<link rel="stylesheet" href="../Public/assets/css/amazeui.min.css"/>
<link rel="stylesheet" href="../Public/assets/css/admin.css">
</head>
<body>
<!-- content start -->
<div class="admin-content">
  <div class="admin-content-body">
    <div class="am-cf am-padding am-padding-bottom-0">
      <div class="am-fl am-cf"> <strong class="am-text-primary am-text-lg">RBAC</strong> / <small>添加角色</small> </div>
    </div>
    <hr>
    <form class="am-form" action="<?php echo U(GROUP_NAME.'/RBAC/addRolehandle');?>" method="post">
    <div class="am-tabs am-margin" data-am-tabs>
      <ul class="am-tabs-nav am-nav am-nav-tabs">
        <li class="am-active"><a href="#tab1">添加角色</a></li>
      </ul>
      <div class="am-tabs-bd">
        <div class="am-tab-panel am-fade am-in am-active" id="tab1">
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-4 am-u-md-2 am-text-right"> 角色名称: </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end">
                <input type="text" name="name" class="am-input-sm">
             </div>
            </div>
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-4 am-u-md-2 am-text-right"> 角色权限描述: </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end">
                <input type="text" name="remark" class="am-input-sm">
              </div>
            </div>
    	<div class="am-g am-margin-top-sm">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> 开启状态: </div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end">
              <div class="am-btn-group" data-am-button>
                <label class="am-btn am-btn-default am-btn-xs <?php if($status == 1): ?>am-active<?php endif; ?>">
                  <input type="radio" name="status" value='1' > 开启
                </label>
                <label class="am-btn am-btn-default am-btn-xs <?php if($status == 2): ?>am-active<?php endif; ?>">
                  <input type="radio" name="status" value='2' > 关闭
                </label>
              </div>
            </div>
        </div>
        
        </div>
      </div>
    </div>
    <div class="am-margin">
    	<input type="hidden" name="pid" value="<?php echo ($pid); ?>">
		<input type ="hidden" name="level" value ="<?php echo ($level); ?>">  
      <button type="submit" class="am-btn am-btn-primary am-btn-xs">确认添加</button>
    </div>
    </form>
  </div>
</div>
<!-- content end -->

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a> 
<script src="../Public/assets/js/jquery.min.js"></script> 
<!--<![endif]--> 
<script src="../Public/assets/js/amazeui.min.js"></script> 
<script src="../Public/assets/js/app.js"></script>
</body>
</html>