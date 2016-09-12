<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>系统设置</title>
  <meta name="description" content="这是一个系统设置页面">
  <meta name="keywords" content="index">
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
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">系统设置</strong> / <small>验证码设置</small></div>
      </div>

      <hr/>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        </div>

        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
          <form class="am-form am-form-horizontal" action="<?php echo U(GROUP_NAME.'/System/updateVerify');?>" method="post">
            <div class="am-form-group">
              <label for="user-name" class="am-u-sm-3 am-form-label">验证码位数</label>
              <div class="am-u-sm-9">
                <input type="text" name="VERIFY_LENGTH" value="<?php echo (C("verify_length")); ?>"placeholder="验证码的位数">
              </div>
            </div>
            <div class="am-form-group">
              <label for="user-email" class="am-u-sm-3 am-form-label">验证码图片宽度</label>
              <div class="am-u-sm-9">
                <input type="text" name="VERIFY_WIDTH" value="<?php echo (C("verify_width")); ?>"placeholder="输入验证码图片宽度">
              </div>
            </div>
            <div class="am-form-group">
              <label for="user-phone" class="am-u-sm-3 am-form-label">验证码图片高度</label>
              <div class="am-u-sm-9">
                <input type="text" name="VERIFY_HEIGHT" value="<?php echo (C("verify_height")); ?>" placeholder="输入验证码图片高度">
              </div>
            </div>
            <div class="am-form-group">
              <label for="user-QQ" class="am-u-sm-3 am-form-label">验证码背景颜色</label>
              <div class="am-u-sm-9">
                <input type="text" name="VERIFY_BGCOLOR" value="<?php echo (C("verify_bgcolor")); ?>"  placeholder="输入验证码背影颜色(16进制色值)">
              </div>
            </div>
            <div class="am-form-group">
              <label for="user-weibo" class="am-u-sm-3 am-form-label">验证码种子</label>
              <div class="am-u-sm-9">
                <input type="text" name="VERIFY_SEED" value="<?php echo (C("verify_seed")); ?>"   placeholder="输入验证码种子">
              </div>
            </div>
            <div class="am-form-group">
              <label for="user-weibo" class="am-u-sm-3 am-form-label">验证码字体文件</label>
              <div class="am-u-sm-9">
                <input type="text" name="VERIFY_FONTFILE" value="<?php echo (C("verify_FONTFILE")); ?>"   placeholder="输入验证码字体文件">
              </div>
            </div>
            <div class="am-form-group">
              <label for="user-weibo" class="am-u-sm-3 am-form-label">验证码字体大小</label>
              <div class="am-u-sm-9">
                <input type="text" name="VERIFY_SIZE" value="<?php echo (C("verify_SIZE")); ?>"   placeholder="输入验证码字体大小">
              </div>
            </div>
            <div class="am-form-group">
              <label for="user-weibo" class="am-u-sm-3 am-form-label">验证码字体颜色</label>
              <div class="am-u-sm-9">
                <input type="text" name="VERIFY_COLOR" value="<?php echo (C("verify_COLOR")); ?>"   placeholder="输入验证码字体颜色(16进制色值)">
              </div>
            </div>
			<div class="am-form-group">
              <label for="user-weibo" class="am-u-sm-3 am-form-label">SESSION识别名称</label>
              <div class="am-u-sm-9">
                <input type="text" name="VERIFY_NAME" value="<?php echo (C("verify_NAME")); ?>"   placeholder="输入SESSION识别名称">
              </div>
            </div>
			<div class="am-form-group">
              <label for="user-weibo" class="am-u-sm-3 am-form-label">验证码到SESSION处理函数</label>
              <div class="am-u-sm-9">
                <input type="text" name="VERIFY_FUNC" value="<?php echo (C("verify_FUNC")); ?>"   placeholder="存储验证码到SESSION时使用函数">
              </div>
            </div>
            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
                <button type="submit" class="am-btn am-btn-primary">保存修改</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </footer>

  </div>
  <!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>

<script src="assets/js/app.js"></script>
</body>
</html>