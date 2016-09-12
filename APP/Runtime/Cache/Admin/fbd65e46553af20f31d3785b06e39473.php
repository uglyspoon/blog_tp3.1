<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>用户列表</title>
<meta name="description" content="这是一个列表展示页面">
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
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">用户列表</strong> / <small>User List</small></div>
  </div>
  <hr>
  <form class="am-form">
    <div class="am-g">
      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 清空回收站</button>
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 审核</button>
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
          </div>
        </div>
      </div>
      <div class="am-u-sm-12 am-u-md-3">
        <div class="am-form-group">
          <select data-am-selected="{btnSize: 'sm'}">
            <option value="option1">所有类别</option>
            <option value="option2">IT业界</option>
            <option value="option3">数码产品</option>
            <option value="option3">笔记本电脑</option>
            <option value="option3">平板电脑</option>
            <option value="option3">只能手机</option>
            <option value="option3">超极本</option>
          </select>
        </div>
      </div>
      <div class="am-u-sm-12 am-u-md-3">
        <div class="am-input-group am-input-group-sm">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn">
          <button class="am-btn am-btn-default" type="button">搜索</button>
          </span> </div>
      </div>
      <div class="am-g">
        <div class="am-u-sm-12">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th>
                <th class="table-id">ID</th>
                <th class="table-title">用户名称</th>
                <th class="table-date am-hide-sm-only">用户上次登录时间</th>
                <th class="table-author am-hide-sm-only">上次登录ip</th>
                <th class="table-type">锁定状态</th>
                <th class="table-type">用户所属组别</th>
                <th class="table-set">操作</th>
              </tr>
            </thead>
            <tbody>
              <?php if(is_array($user)): foreach($user as $key=>$v): ?><tr>
                  <td><input type="checkbox" /></td>
                  <td><?php echo ($v["id"]); ?></td>
                  <td><?php echo ($v["username"]); ?></td>
                  <td><?php echo (date('Y-m-d H:i',$v["logtime"])); ?></td>
                  <td class="am-hide-sm-only"><?php echo ($v["logip"]); ?></td>
                  <td><?php if($v["lock"]): ?>锁定<?php else: ?>未锁定<?php endif; ?></td>
                  <td><?php if($v["username"] == C("RBAC_SUPERADMIN")): ?>超级管理员
					<?php else: ?>
					<ul>
						<?php if(is_array($v["role"])): foreach($v["role"] as $key=>$vo): ?><li><?php echo ($vo["name"]); ?>(<?php echo ($vo["remark"]); ?>)</li><?php endforeach; endif; ?>
					</ul><?php endif; ?>
				  </td>
                  <td><div class="am-btn-toolbar">
                      <div class="am-btn-group am-btn-group-xs">
            
                          <a href="" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 锁定</a>
                          
                      </div>
                    </div></td>
                </tr><?php endforeach; endif; ?>
            </tbody>
          </table>
          <div class="am-cf"> 共 15 条记录
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
</div>
<!-- content end --> 

<script src="../Public/assets/js/jquery.min.js"></script> 
<!--<![endif]--> 
<script src="../Public/assets/js/amazeui.min.js"></script> 
<script src="../Public/assets/js/app.js"></script>
</body>
</html>