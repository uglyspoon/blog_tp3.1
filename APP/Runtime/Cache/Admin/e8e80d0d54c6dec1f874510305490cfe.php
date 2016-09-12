<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>节点列表</title>
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
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">节点列表</strong> / <small>Node List</small></div>
      </div>

      <hr>
<form class="am-form" action="<?php echo U(GROUP_NAME.'/Category/sortCate');?>" method="post">
      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              [<a href=""><strong>添加应用</strong></a>]
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
        </div>
        <div class="am-u-sm-12 am-u-md-3">
        </div>
      </div>

      <div class="am-g">
        <div class="am-u-sm-12">
   <?php if(is_array($node)): foreach($node as $key=>$app): ?><strong><?php echo ($app["title"]); ?></strong>
        [<a href="<?php echo U('Admin/RBAC/addNode',array('pid'=>$app['id'],'level'=>2));?>">  添加控制器</a>]
        [<a href="">修改</a>]
        [<a href="">删除</a>]

      <?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
          <dt>
            <strong>&emsp;&emsp;<?php echo ($action["title"]); ?></strong>
            <a href="<?php echo U('Admin/RBAC/addNode',array('pid'=>$action['id'],'level'=>3 ));?>">添加方法</a>
          </dt>
          <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
              <span>&emsp;&emsp;&emsp;&emsp;<?php echo ($method["title"]); ?></span>
              <a href="">修改</a>
              <a href="">删除</a>
            </dd><?php endforeach; endif; ?>
        </dl><?php endforeach; endif; endforeach; endif; ?>      
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