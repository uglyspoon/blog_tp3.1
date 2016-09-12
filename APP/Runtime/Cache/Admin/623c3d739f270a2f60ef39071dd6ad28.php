<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>配置权限</title>
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
  <script type="text/javascript" src ="__PUBLIC__/jquery.js"></script>
  <script type="text/javascript">
    $(function(){
      $('input[level=1]').click(function(event) {
        var inputs = $(this).parents('.app').find('input');
        $(this).attr('checked')?inputs.attr('checked','checked'):inputs.removeAttr('checked');
      });
      $('input[level=2]').click(function(event) {
        var inputs = $(this).parents('dl').find('input');
        $(this).attr('checked')?inputs.attr('checked','checked'):inputs.removeAttr('checked');
      });
    });
  </script>
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
  		<?php if(is_array($node)): foreach($node as $key=>$app): ?><div class="app">
			<p>
				<strong><?php echo ($app["title"]); ?></strong>
				<input type="checkbox" name='access[]' value='<?php echo ($app["id"]); ?>_1' level='1' 
				<?php if($app["access"]): ?>checked<?php endif; ?> >
			</p>
			<?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dt>
						<strong>&emsp;&emsp;<?php echo ($action["title"]); ?></strong>
						<input type="checkbox" name="access[]" value ='<?php echo ($action["id"]); ?>_2' level='2'
						<?php if($action["access"]): ?>checked<?php endif; ?> > 
					</dt>
					<?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
							<span>&emsp;&emsp;&emsp;&emsp;<?php echo ($method["title"]); ?></span>
							<input type="checkbox" name="access[]" value ='<?php echo ($method["id"]); ?>_3' level='3'
							<?php if($method["access"]): ?>checked<?php endif; ?> > 
						</dd><?php endforeach; endif; endforeach; endif; ?>
			<input type="hidden" name='rid' value="<?php echo ($rid); ?>">
			<input type="submit" value="保存修改">
		</form>
		</div><?php endforeach; endif; ?>
          
        </div>
      </div>
    </div>
  </div>
  <!-- content end -->
<!--<![endif]-->
<script src="../Public/assets/js/amazeui.min.js"></script>
<script src="../Public/assets/js/app.js"></script>
</body>
</html>