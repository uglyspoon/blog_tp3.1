<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>浪花博客</title>
<meta name="keywords" content="关键词" />
<meta name="description" content="页面描述" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<link href="../Public/css/base.css" rel="stylesheet">
<link rel="icon" type="image/png" href="../Public/images/icon.ico">
<link href="../Public/css/style.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="../Public/js/modernizr.js"></script>
<![endif]-->
<!-- 返回顶部调用 begin -->
<link href="../Public/css/lrtk.css" rel="stylesheet" />
<script type="text/javascript" src="../Public/js/jquery.js"></script>
<script type="text/javascript" src="../Public/js/js.js"></script>
<!-- 返回顶部调用 end-->
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
<article class="blogs">
<h1 class="t_nav"><span><?php echo ($remark); ?></span><a href="<?php echo U('/');?>" class="n1">网站首页</a>
  <?php if(is_array($parents)): foreach($parents as $key=>$v): ?><a href="<?php echo U('/cate/'.$v['id']);?>" class="n2"><?php echo ($v["name"]); ?></a><?php endforeach; endif; ?>
</h1>
    <div class="newblog left">
<?php if(is_array($blog)): foreach($blog as $key=>$v): ?><h2><a title="<?php echo ($v["title"]); ?>" href="<?php echo U('article/'.$v['id']);?>" ><?php echo ($v["title"]); ?></a></h2>
   <p class="dateview"><span>发布时间：<?php echo (date('Y-m-d H:i',$v["time"])); ?></span><span>作者：<?php echo ($v["author"]); ?></span><span>点击数:[<?php echo ($v["click"]); ?>]</span></p>
    <figure><a title="<?php echo ($v["title"]); ?>" href="<?php echo U('article/'.$v['id']);?>" ><img src="<?php echo ($v["coverpic"]); ?>" alt="<?php echo ($v["title"]); ?>" ></a></figure>
    <ul class="nlist">
      <p><?php echo ($v["summary"]); ?></p>
      <a href="<?php echo U('article/'.$v['id']);?>"  target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <div class="line"></div><?php endforeach; endif; ?>
    
    
    <!--  分页前修饰线和空白-->
    <div class="blank"></div>
    <!-- 分页代码开始-->
    <div class="page"><?php echo ($page); ?></div>
    </div>
    <!-- 分页代码结束-->
<aside class="right">
<?php echo W('Sub',array('id'=>$id));?>
<div class="blank"></div>
    <div class="news">
      <?php echo W('New',array('limit'=>8,'cid'=>$id));?>
      <?php echo W('Hot',array('limit'=>9,'cid'=>$id));?>
    </div>

<div class="visitors">
      <h3><p>最近访客</p></h3>
     <ul class="ds-recent-visitors"  data-num-items="24"></ul>
    </div>
</aside>
</article>
<div id="tbox"> <a id="togbook" href="message.html"></a> <a id="gotop" href="javascript:void(0)"></a> </div>
<footer>
  <p>Design by Spoon <a href="http://www.baidu.com" target="_blank">  赣ICP备16003938号</a> </p>
</footer>
<script src="../Public/js/silder.js"></script>
<!--
<script src="../Public/js/i.js" type="text/javascript"></script>
<script src="../Public/js/cnw.js" type="text/javascript"></script>
-->
</body>
</html>