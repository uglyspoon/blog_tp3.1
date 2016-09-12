<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>栏目列表</title>
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
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">当前分类</strong> / <small>分类列表</small></div>
      </div>

      <hr>
<form class="am-form" action="<?php echo U(GROUP_NAME.'/Category/sortCate');?>" method="post">
      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              
              <button type="submit" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 排序</button>
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
          
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">栏目标题</th><th class="table-type">所属级别</th><th class="table-author am-hide-sm-only">排序</th><th class="table-date am-hide-sm-only">添加日期</th><th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>
                <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><tr>
                <td><input type="checkbox" /></td>
                <td><?php echo ($v["id"]); ?></td>
                <td><a href="#" title="<?php echo ($v["remark"]); ?>"><?php echo ($v["html"]); echo ($v["name"]); ?></a></td>
                <td><?php echo ($v["level"]); ?>级栏目</td>
                <td class="am-hide-sm-only">
                  <input type="text" name='<?php echo ($v["id"]); ?>' value='<?php echo ($v["sort"]); ?>' style="width:50px;"></td>
                <td class="am-hide-sm-only">2014年9月4日 7:28:47</td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <a  href ="<?php echo U(GROUP_NAME.'/Category/addCate',array('pid'=>$v['id']));?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 添加子类</a>
                      <button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 编辑</button>
                      <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </div>
                </td>
              </tr><?php endforeach; endif; ?>
              </tbody>
            </table>
            <div class="am-cf">
              共 15 条记录
              <div class="am-fr">
                <ul class="am-pagination">
                  <li class="am-disabled"><a href="#">«</a></li>
                  <li class="am-active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">»</a></li>
                </ul>
              </div>
            </div>
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