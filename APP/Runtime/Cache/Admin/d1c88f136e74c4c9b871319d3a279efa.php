<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>角色列表</title>
  <meta name="description" content="这是一个 table 页面">
  <meta name="keywords" content="table">
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
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">当前角色</strong> / <small>Role List</small></div>
      </div>

      <hr>
<form class="am-form" action="<?php echo U(GROUP_NAME.'/Category/sortCate');?>" method="post">
      <div class="am-g">
        <div class="am-u-sm-12">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                <th class="table-id">ID</th><th class="table-title">角色名称</th><th class="table-type">角色描述</th><th class="table-type">开启状态</th><th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>
                <?php if(is_array($role)): foreach($role as $key=>$v): ?><tr>
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["name"]); ?></td>
                <td><?php echo ($v["remark"]); ?></td>
                <td>
					<?php if($v.["status"]): ?>开启
					<?php else: ?>
						关闭<?php endif; ?>
				</td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <a href="<?php echo U('Admin/RBAC/access',array('rid' => $v['id']));?>" class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 配置权限</a>
                    </div>
                  </div>
                </td>
              </tr><?php endforeach; endif; ?>
              </tbody>
            </table>
            <hr />
            <p>注：.....</p>
         
        </div>

      </div>
    </div>
 </form>
    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </footer>

  </div>
  <!-- content end -->
</div>
<script src="../Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="../Public/assets/js/amazeui.min.js"></script>
<script src="../Public/assets/js/app.js"></script>
</body>
</html>