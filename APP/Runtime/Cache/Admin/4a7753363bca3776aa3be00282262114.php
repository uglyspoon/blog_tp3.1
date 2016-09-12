<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>博文列表</title>
  <meta name="description" content="这是一个列表展示页面">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="../Public/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="../Public/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="../Public/assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="../Public/assets/css/admin.css">
  <script type="text/javascript" src="__PUBLIC__/jquery-1.7.2.min.js"></script>
  <script type="text/javascript">
    $(function(){
      $('#checkAll').click(function(){
        var inputs = $('tbody.tt').find('input[type=checkbox]');   // attr 不行  prop 就可以 为什么？
        /*
        对于HTML元素本身就带有的固有属性，在处理时，使用prop方法。
        对于HTML元素我们自己自定义的DOM属性，在处理时，使用attr方法。
        http://www.cnblogs.com/Showshare/p/different-between-attr-and-prop.html
        */  
        $(this).prop('checked')?inputs.prop('checked',true):inputs.removeAttr('checked');
      });
    });
  </script>
</head>
<body>
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
    <form class="am-form" method="post" action="<?php echo U(GROUP_NAME.'/Blog/index');?>">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">博文列表</strong> / <small>Blog List</small></div>
      </div>
      <hr>
      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 全部删除 / 还原</button>
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-form-group">
            <select name="cate-src" data-am-selected="{btnSize: 'sm'}">
              <option value=0>所有类别</option>
            <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
            </select>
            <div class="am-btn-group am-btn-group-xs">
              <button type="submit" class="am-btn am-btn-default" name="cate-btn" value><span class="am-icon-search"></span></button>
            </div>
          </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
          <div class="am-input-group am-input-group-sm">
            <input type="text" name="keywords" class="am-form-field">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="submit">搜索</button>
          </span>
          </div>
        </div>
      </div>
      <div class="am-g">
        <div class="am-u-sm-12">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                <th class="table-check"><input type="checkbox" id="checkAll"></th><th class="table-id">ID</th><th class="table-title">标题</th><th class="table-type">所属栏目</th><th class="table-author am-hide-sm-only">作者</th><th class="table-type">点击</th><th class="table-type">状态</th><th class="table-date am-hide-sm-only">修改日期</th><th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody class='tt'>
              <?php if(is_array($blog)): foreach($blog as $key=>$v): ?><tr>
                <td><input type="checkbox"></td>
                <td><?php echo ($v["id"]); ?></td>
                <td><a href="#">
                  <?php if(is_array($v["attr"])): foreach($v["attr"] as $key=>$vo): ?><strong style='color:<?php echo ($vo["color"]); ?>'>[<?php echo ($vo["name"]); ?>]</strong><?php endforeach; endif; ?>
                  <?php echo ($v["title"]); ?>
                </a>
                </td>
                <td><?php echo ($v["cate"]); ?></td>
                <td class="am-hide-sm-only"><?php echo ($v["author"]); ?></td>
                <td><?php echo ($v["click"]); ?></td>
                <td>
                  <?php if($v["status"] == 1): ?>正常
                  <?php else: ?>
                    待审核<?php endif; ?>
                </td>
                <td class="am-hide-sm-only"><?php echo (date('Y-m-d H:i',$v["time"])); ?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <?php if(ACTION_NAME == "index"): ?><a href="<?php echo U(GROUP_NAME.'/Blog/editBlog',array('id'=>$v['id']));?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                          <a href="<?php echo U(GROUP_NAME.'/Blog/toTrash',array('id'=>$v['id'],'type'=>1));?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
                      <?php else: ?>
                          <a href="<?php echo U(GROUP_NAME.'/Blog/toTrash',array('id'=>$v['id'],'type'=>0));?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 还原</a>
                          <a href="<?php echo U(GROUP_NAME.'/Blog/delete',array('id'=>$v['id']));?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 彻底删除</a><?php endif; ?>
                    </div>
                  </div>
                </td>
              </tr><?php endforeach; endif; ?>
              </tbody>
            </table>

            <div class="am-cf">
              共 <?php echo ($count); ?> 篇文章
              <div class="am-fr">
                <ul class="am-pagination">
                  <?php echo ($page); ?>
                </ul>
              </div>
            </div>
            <hr />

     </form>
        </div>

      </div>
    </div>
  </div>
  <!-- content end -->

<script src="../Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="../Public/assets/js/amazeui.min.js"></script>
<script src="../Public/assets/js/app.js"></script>
</body>
</html>