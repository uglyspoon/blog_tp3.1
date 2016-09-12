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
<link href="../Public/css/mood.css" rel="stylesheet">
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
<div class="moodlist">
  <h1 class="t_nav"><span>删删写写，回回忆忆，虽无法行云流水，却也可碎言碎语。</span><a href="<?php echo U('/');?>" class="n1">网站首页</a><a href="#" class="n2">时间轴</a></h1>
  <div class="bloglist">
    <?php if(is_array($time)): foreach($time as $key=>$v): ?><ul class="arrow_box">
     <div class="sy"><p><img src="<?php echo ($v["picpath"]); ?>"  /><?php echo ($v["content"]); ?></p></div>
      <span class="dateview"><?php echo (date('Y-m-d H:i',$v["time"])); ?></span>
    </ul><?php endforeach; endif; ?>
  </div>
  <div class="page"><a title="Total record"><b>168</b> </a><b>1</b><a href="/newstalk/index_2.html">2</a><a href="/newstalk/index_3.html">3</a><a href="/newstalk/index_4.html">4</a><a href="/newstalk/index_5.html">5</a><a href="/newstalk/index_6.html">6</a><a href="/newstalk/index_7.html">7</a><a href="/newstalk/index_2.html">></a><a href="/newstalk/index_7.html">>></a></div> 
</div>
<div id="tbox"> <a id="togbook" href="message.html"></a> <a id="gotop" href="javascript:void(0)"></a> </div>
<footer>
  <p>Design by UglySpoon <a href="#" target="_blank">###</a> </p>
</footer>
<script src="../Public/js/silder.js"></script>
</body>
</html>