<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../Public/images/icon.ico">
    <title>留言板</title>
    <link href="../Public/css/base.css" rel="stylesheet">
    <link href="../Public/css/lrtk.css" rel="stylesheet" />
    <link href="../Public/message/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Public/message/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../Public/message/css/animate.css" rel="stylesheet">
    <link href="../Public/message/css/style.css" rel="stylesheet">
</head>
<body>
 <?php $cate=M('cate')->order('sort')->select(); import('Class.Category',APP_PATH); $cate=Category::unlimitedForLayer($cate); ?>
 <header>
  <div id="logo"><a href="<?php echo U('/');?>"></a></div>
  <nav class="topnav" id="topnav">
  	<?php if(is_array($cate)): foreach($cate as $key=>$v): if($v["type"] == 1): ?><a href="<?php echo U('Index/Index/about');?>"><span><?php echo ($v["name"]); ?></span><span class="en">About</span></a>
  		<?php elseif($v["type"] == 2): ?>
  			<a href="<?php echo U('cate/'.$v['id']);?>"><span><?php echo ($v["name"]); ?></span><span class="en">Articles</span></a>
  		<?php elseif($v["type"] == 3): ?>
  			<a href="<?php echo U('/time');?>"><span><?php echo ($v["name"]); ?></span><span class="en">Time</span></a>
  		<?php elseif($v["type"] == 4): ?>
  			<a href="<?php echo U('Index/Message');?>"><span><?php echo ($v["name"]); ?></span><span class="en">Message</span></a>
  		<?php else: ?>
  			<a href="<?php echo U('/wish');?>" ><span><?php echo ($v["name"]); ?></span><span class="en">Wish</span></a><?php endif; endforeach; endif; ?>
    <a href="<?php echo U('Public/love/index.html');?>" ><span>等待  </span><span class="en">Love</span></a>
  </nav>
</header>
<!-- 正文开始 -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInUp">
                <ul class="notes">
                    <?php if(is_array($message)): foreach($message as $key=>$v): ?><li>
                            <div style="color:#fff;background:<?php echo ($v["color"]); ?>;overflow:hidden;">
                                <small><?php echo (date("Y-m-d H:i:s",$v["time"])); ?></small>
                                <h4><?php echo ($v["title"]); ?></h4>
                                <p ><?php echo ($v["content"]); ?></p>
                                <a href="#"><i class="fa fa-paint-brush"></i><?php echo ($v["name"]); ?></a>
                            </div>
                        </li><?php endforeach; endif; ?>
                </ul>
            </div>

        </div>

    </div>
    <div>
        <ul id="pagination-digg">
            <?php echo ($page); ?>
        </ul>
    </div>
    <!-- 留言开始 -->
    <hr>
    <center><h1>开始留言</h1></center>
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <form action = "__URL__/addMessage" method="post">
                    <div class="form-group has-success"><label class="col-sm-2 control-label">标题：</label>
                        <div class="col-sm-10"><input class="form-control" type="text" required name = "title"></div>
                    </div>
                    <br><br><br>
                    <div class="form-group has-success"><label class="col-sm-2 control-label">署名：</label>
                        <div class="col-sm-10"><input class="form-control" type="text" required name = "name"></div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group has-success"><label class="col-sm-2 control-label">内容：</label>
                        <div class="col-sm-10"><textarea name="content" id="" rows="8" style="width:100%;" required></textarea></div>
                    </div>
                    <br><br><br><br><br><br><br><br><br><br>
                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10"><button type="submit" class="btn btn-w-m btn-danger" style="width:100%;">点击提交</button></div>
                    </div>
            </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-warning" >
                <div class="panel-heading">
                    <i class="fa fa-warning"></i>留言规则
                </div>
                <div class="panel-body">
                    <ul>
                        <li>不允许发送带有辱骂信息</li>
                        <li>不允许发送广告</li>
                        <li>不允许发送人身攻击</li>
                        <li>不允许做无聊的事情</li>
                        <li style="color:red;">留言内容千万别超过100字。不然会被截取</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- 留言结束 -->
</div>
<!-- 正文结束 -->
</body>
</html>