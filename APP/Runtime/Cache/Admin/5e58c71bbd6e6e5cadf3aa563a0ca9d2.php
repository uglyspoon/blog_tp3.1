<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>博文编辑</title>
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
  <link rel="stylesheet" href="__PUBLIC__/kindeditor/themes/default/default.css" />
  <script charset="utf-8" src="__PUBLIC__/kindeditor/kindeditor-all-min.js"></script>
  <script charset="utf-8" src="__PUBLIC__/kindeditor/lang/zh-CN.js"></script>
  <script charset="utf-8" src="__PUBLIC__/jquery.js"></script>
  <script type="text/javascript">
  $(function(){
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('textarea[name="content"]', {
            allowFileManager : true,
            resizeType : 1, //1:可以拖动改变高度,2:可以改变高度和宽度
            width:"100%", //
            height:"600px",
        });
        //图片上传插件
        K('#image1').click(function() {
          editor.loadPlugin('image', function() {
            editor.plugin.imageDialog({
              showRemote : false,
              imageUrl : K('#url1').val(),
              clickFn : function(url, title, width, height, border, align) {
                K('#url1').val(url);
                editor.hideDialog();
              }
            });
          });
        });//图片上传插件结束
    });
  });
  </script>

</head>
<body>
<!-- content start -->
<div class="admin-content">
  <div class="admin-content-body">
    <div class="am-cf am-padding am-padding-bottom-0">
      <div class="am-fl am-cf">
        <strong class="am-text-primary am-text-lg">博文编辑</strong> /
        <small>Edit blog</small>
      </div>
    </div>
    <hr>
    <form class="am-form"  action="<?php if(isset($blog)): echo U(GROUP_NAME.'/Blog/editBlogHandle'); else: echo U(GROUP_NAME.'/Blog/addBlogHandle'); endif; ?>" method="post">
    <div class="am-tabs am-margin" data-am-tabs>
      <ul class="am-tabs-nav am-nav am-nav-tabs">
        <li class="am-active"><a href="#tab1">
          <?php if(isset($blog)): ?>编辑
          <?php else: ?>发布<?php endif; ?>
        </a></li>
      </ul>
    
      <div class="am-tabs-bd">
        <div class="am-tab-panel am-fade am-in am-active" id="tab1">
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">所属类别</div>
            <div class="am-u-sm-8 am-u-md-10">
              <select name='cid' data-am-selected="{btnSize: 'sm'}">
                <option name ="cid" value="0">==点击选择分类==</option>
        				<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option name="cid" value="<?php echo ($v["id"]); ?>"
                  <?php if($v["id"] == $blog["cid"]): ?>selected<?php endif; ?>
                  ><?php echo ($v["html"]); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
              </select>
            </div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">显示状态</div>
            <div class="am-u-sm-8 am-u-md-10">
              <div class="am-btn-group" data-am-button>
                <label class="am-btn am-btn-default am-btn-xs <?php if($status == 1): ?>am-active<?php endif; ?>">
                  <input type="radio" name="status" value='1' > 正常
                </label>
                <label class="am-btn am-btn-default am-btn-xs <?php if($status == 2): ?>am-active<?php endif; ?>">
                  <input type="radio" name="status" value='2' > 待审核
                </label>
              </div>
            </div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">推荐类型</div>
            <div class="am-u-sm-8 am-u-md-10">
              <div class="am-btn-group" data-am-button>
                <?php if(is_array($attr)): foreach($attr as $key=>$v): ?><label class="am-btn am-btn-default am-btn-xs <?php if(is_array($attrs)): foreach($attrs as $key=>$vo): if($v["id"] == $vo["aid"]): ?>am-active<?php endif; endforeach; endif; ?>">
                  <input type="checkbox" name="aid[]" value='<?php echo ($v["id"]); ?>' <?php if(is_array($attrs)): foreach($attrs as $key=>$vo): if($v["id"] == $vo["aid"]): ?>checked<?php endif; endforeach; endif; ?>><?php echo ($v["name"]); ?></label><?php endforeach; endif; ?>
               </div>
            </div>
          </div>
          </div>

           <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                文章标题
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input type="text" name="title" class="am-input-sm" value="<?php echo ($blog["title"]); ?>">
              </div>
              <div class="am-hide-sm-only am-u-md-6">*必填</div>
            </div>
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                文章概述
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input type="text" name="summary" class="am-input-sm" value="<?php echo ($blog["summary"]); ?>">
              </div>
              <div class="am-hide-sm-only am-u-md-6">显示在文章列表的概括</div>
              
            </div>
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                文章作者
              </div>
              <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                <input type="text" name="author" class="am-input-sm" value="<?php echo ($blog["author"]); ?>">
              </div>
            </div>
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                初始点击次数
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input type="text" name="click" class="am-input-sm" value="<?php echo ($blog["click"]); ?>">
              </div>
              <div class="am-hide-sm-only am-u-md-6">选填</div>
            </div>
            <div class="am-g am-margin-top">
              <div class="am-u-sm-4 am-u-md-2 am-text-right">
                博文图片路径
              </div>
              <div class="am-u-sm-8 am-u-md-4">
                <input type="text" name="coverpic" id="url1" class="am-input-sm" value="<?php echo ($blog["coverpic"]); ?>">
              </div>
              <div class="am-hide-sm-only am-u-md-6"><input type="button" id="image1" value="选择图片" />（本地上传）</div>
            </div>
            <div class="am-g am-margin-top-sm">
            
                <textarea name="content" id="content" rows="10" placeholder=""><?php echo ($blog["content"]); ?></textarea>

            </div>
        </div>
      </div>
    
    </div>
    <div class="am-margin">
      <input type="hidden" name='id' value="<?php echo ($blog["id"]); ?>"/>
      <button type="submit" class="am-btn am-btn-primary am-btn-xs" >提交保存</button>
    </div>
    </form>
  </div>

<!-- content end -->
<script src="../Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="../Public/assets/js/amazeui.min.js"></script>
<script src="../Public/assets/js/app.js"></script>
</body>
</html>