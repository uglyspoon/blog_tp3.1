<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js fixed-layout">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>后台管理</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="../Public/assets/i/icon.ico">
  <link rel="apple-touch-icon-precomposed" href="../Public/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="../Public/assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="../Public/assets/css/admin.css">
  <base target="iframe"/>
</head>
<body>
  <audio src="__PUBLIC__/music/花澤香菜 - sweets parade.mp3" autoplay loop></audio>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->
<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand">
    <small>哎呀!是尊敬的</small> <strong><?php echo ($_SESSION['username']); ?></strong><small>&ensp;快请坐~</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span></a></li>
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
          <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
          <li><a href="<?php echo U(GROUP_NAME.'/Index/logout');?>" target="_self"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="<?php echo U(GROUP_NAME.'/Index/welcome');?>"><span class="am-icon-home"></span> 欢迎页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav1'}"><span class="am-icon-book"></span> 博文管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-out" id="collapse-nav1">
            <li><a href="<?php echo U(GROUP_NAME.'/Blog/index');?>" class="am-cf"><span class="am-icon-list-ol"></span> 博文列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
            <li><a href="<?php echo U(GROUP_NAME.'/Blog/addBlog');?>"><span class="am-icon-plus-circle"></span>  添加博文</a></li>
            <li><a href="<?php echo U(GROUP_NAME.'/Blog/trash');?>"><span class="am-icon-trash"></span> 回收站</a></li>
          </ul>
        </li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav2'}"><span class="am-icon-cog"></span> 属性管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-out" id="collapse-nav2">
            <li><a href="<?php echo U(GROUP_NAME.'/Attribute/index');?>" class="am-cf"><span class="am-icon-list-alt"></span> 属性列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
            <li><a href="<?php echo U(GROUP_NAME.'/Attribute/addAttr');?>"><span class="am-icon-plus-square"></span> 添加属性</a></li>
          </ul>
        </li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav3'}"><span class="am-icon-align-left"></span> 分类管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-out" id="collapse-nav3">
            <li><a href="<?php echo U(GROUP_NAME.'/Category/index');?>" class="am-cf"><span class="am-icon-list-ul"></span> 分类列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
            <li><a href="<?php echo U(GROUP_NAME.'/Category/addCate');?>"><span class="am-icon-plus-square"></span> 添加分类</a></li>
          </ul>
        </li>
       <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav4'}"><span class="am-icon-users"></span> RBAC <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-out" id="collapse-nav4">
            <li><a href="<?php echo U(GROUP_NAME.'/RBAC/index');?>" class="am-cf"><span class="am-icon-user"></span> 用户列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
            <li><a href="<?php echo U(GROUP_NAME.'/RBAC/node');?>"><span class="am-icon-list"></span> 节点列表</a></li>
            <li><a href="<?php echo U(GROUP_NAME.'/RBAC/role');?>"><span class="am-icon-user-md"></span> 角色列表<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
            <li><a href="<?php echo U(GROUP_NAME.'/RBAC/addUser');?>"><span class="am-icon-plus"></span> 添加用户</a></li>
            <li><a href="<?php echo U(GROUP_NAME.'/RBAC/addRole');?>"><span class="am-icon-plus-circle"></span> 添加角色</a></li>
            <li><a href="<?php echo U(GROUP_NAME.'/RBAC/addNode');?>"><span class="am-icon-plus-square"></span> 添加节点</a></li>
          </ul>
        </li>
         <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav5'}"><span class="am-icon-warning"></span> 系统设置<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-out" id="collapse-nav5">
            <li><a href="<?php echo U(GROUP_NAME.'/System/verify');?>"><span class="am-icon-bug"></span>验证码设置</a></li>
          </ul>
        </li>
        <li><a href="<?php echo U(GROUP_NAME.'/MsgManage/index');?>"><span class="am-icon-heart"></span> 愿望管理</a></li>
        <li><a href="<?php echo U(GROUP_NAME.'/TimeManage/index');?>"><span class="am-icon-anchor"></span> 时光轴管理</a></li>
        <li><a href="<?php echo U(GROUP_NAME.'/MsgManage/index');?>"><span class="am-icon-paw"></span> 留言本管理</a></li>
      </ul>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> 公告</p>
          <p>时光静好，与君语；细水流年，与君同。<br> &emsp;&emsp;&emsp;&emsp;&emsp;—— 浪花寄语</p>
        </div>
      </div>
      
    </div>
  </div>

  <!-- sidebar end -->

  <!-- content start -->
  <div class="blog-right">
  	<iframe name="iframe" src="<?php echo U(GROUP_NAME.'/Index/welcome');?>"></iframe>
  </div>
  <!-- content end -->
  </div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="../Public/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="../Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="../Public/assets/js/amazeui.min.js"></script>
<script src="../Public/assets/js/app.js"></script>
</body>
</html>