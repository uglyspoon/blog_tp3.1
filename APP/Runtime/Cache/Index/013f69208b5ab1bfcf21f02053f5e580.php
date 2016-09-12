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
<link href="../Public/css/index.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/clock/csshake.min.css">
<script type="text/javascript" src="__PUBLIC__/clock/index.js"></script>
<style type="text/css">
.clock{margin:0;padding:0;list-style-type:none;}
.clock a,img{border:0;}
.clock{font:12px/67% Arial, Helvetica, sans-serif, "新宋体";background:#fff;}
/* clock */
.clock{width:280px;height:50px;margin:30px 0 0px 170px;transform:translate(-50%, -50%);color:#d96457;font-family:"Lato", sans-serif;}
.clock div{position:relative;float:left;background:#ffe8e8;border-radius:6px;width:50px;height:50px;line-height:50px;text-align:center;font-size:40px;margin:0px 5px;}
</style>
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
  			<a href="<?php echo U('/wish');?>"><span><?php echo ($v["name"]); ?></span><span class="en">Wish</span></a><?php endif; endforeach; endif; ?>
    <a href="<?php echo U('Public/love/index.html');?>"><span>等待  </span><span class="en">Love</span></a>
  </nav>
</header>
<div class="banner">
  <section class="box">
    <ul class="texts">
      <p>我可以划船不用桨</p> 
      <p>&emsp;我可以扬帆没有风向</p> 
      <p>&emsp;&emsp;因为我这一生，全靠浪</p> 
    </ul>
    <div class="avatar"><a href="about.html"><span>小浪花</span></a> </div>
  </section>
</div>
<div class="template">
  <div class="box">
    <h3><p><span>置顶</span>文章 Recommend</p></h3>
    <ul>
<li><a href="#" title="#" ><img src="#" alt="#"></a><span>企业单页宣传模板</span></li>
<li><a href="news.htmldiv/2014-09-18/730.html" title="情侣博客模板系列之《回忆》Html" ><img src="../Public/images/a79ec800b99c6348be21f17b0364621b.jpg" alt="情侣博客模板系列之《回忆》Html"></a><span>情侣博客模板系列之《回忆》Html</span></li>
<li><a href="news.htmldiv/2014-08-18/727.html" title="情侣博客模板系列之《回忆》PSD" ><img src="../Public/images/82341b1592c4edca23cd73b390d1e4af.jpg" alt="情侣博客模板系列之《回忆》PSD"></a><span>情侣博客模板系列之《回忆》PSD</span></li>
<li><a href="news.htmldiv/2014-08-11/726.html" title="情侣博客模板系列之《初夏》Html" ><img src="../Public/images/a0fdaddb02589193917cc8c239aca5cb.gif" alt="情侣博客模板系列之《初夏》Html"></a><span>情侣博客模板系列之《初夏》Html</span></li>
  <li><a href="news.htmldiv/2014-06-13/689.html" title="个人博客模板《世界杯来袭》" ><img src="../Public/images/1c0c0b9ba7b4b72266d980e69258933c.jpg" alt="个人博客模板《世界杯来袭》"></a><span>个人博客模板《世界杯来袭》</span></li> 
   </ul>
  </div>
</div>
<article>
  <h2 class="title_tj">
    <p>文章<span>推荐</span></p>
  </h2>
  <div class="bloglist left">
    <?php if(is_array($tj)): foreach($tj as $key=>$v): ?><h3>
      <a href="<?php echo U('article/'.$v['id']);?>" ><?php echo ($v["title"]); ?></a>
    </h3>
    <figure><img src="<?php echo ($v["coverpic"]); ?>" alt="pic"></figure>
    <ul>
      <p><?php echo ($v["summary"]); ?></p>
      <a  href="<?php echo U('article/'.$v['id']);?>"  target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <p class="dateview"><span><?php echo (date('Y-m-d H:i',$v["time"])); ?></span><span>作者：<?php echo ($v["author"]); ?></span><span>点击次数：[<?php echo ($v["click"]); ?>]</span>  
    </p><?php endforeach; endif; ?>   
    </div>
  <aside class="right">
    <div class='clock'>
  <div class='h shake shake-slow'></div>
  <div class='m shake shake-slow'></div>
  <div class='s shake shake-slow'></div>
  </div>
    <div class="news">
      <?php echo W('New',array('limit'=>8));?>
      <?php echo W('Hot',array('limit'=>9));?>
    <h3 class="links">
      <p>友情<span>链接</span></p>
    </h3>
    <ul class="website">
      <li><a href="h#" target="_blank">###</a></li>
    </ul>     
  </div>
<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<div class="guanzhu">扫描二维码关注<span>小浪花微信!</span>还是单身哦</div>   
    <a href="index.html" class="weixin" onclick="javacript:return false;"></a></aside>
</article>
<footer>
  <p>Design by Spoon <a href="http://www.baidu.com" target="_blank">tuguang.site</a> </p>
</footer>
<script src="../Public/js/silder.js"></script>
<!--
<script src="../Public/js/i.js" type="text/javascript"></script>
<script src="../Public/js/cnw.js" type="text/javascript"></script>
-->
</body>
</html>