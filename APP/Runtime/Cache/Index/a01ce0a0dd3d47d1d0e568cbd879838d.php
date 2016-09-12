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
<link href="../Public/css/about.css" rel="stylesheet">
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
<article class="aboutcon">
<h1 class="t_nav"><span>像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span><a href="<?php echo U('/');?>" class="n1">网站首页</a><a href="<?php echo U('Index/Index/about');?>" class="n2">关于我</a></h1>
<div class="about left">
  <h2><?php echo ($blog["title"]); ?></h2>
    <?php echo ($blog["content"]); ?>
</div>
<aside class="right">  
    <div class="about_c">
    <p>网名：<span>UglySpoon</span> | Man</p>
    <p>姓名：涂广 </p>
    <p>籍贯：江西省-上饶市</p>
    <p>现居：江西省-华东交通大学</p>
    <p>意向职业：PHP初级</p>
    <p>喜欢的书：《冰与火之歌》《红楼梦》</p>
    <p>喜欢的音乐：《心做し》《just one last dance》《アイロニ》</p>
<p><a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&amp;email=HHh9cn95b3F1cHVye1xtbTJ-c3E" ><img src="../Public/images/ico_mailme_22.png" alt="杨青个人博客网站"></a></p>
<p>
<!--以下是QQ邮件列表订阅嵌入代码--><a target="_blank" href="http://list.qq.com/cgi-bin/qf_invite?id=65fb9b3618916f162973471ebc5b97ff786efae0ec9a863e"><img border="0" alt="填写您的邮件地址，订阅我们的精彩内容：" src="../Public/images/picMode_light_m.png" /></a>
</p>

</div>     
</aside>
</article>
<footer>
  <p>Design by Spoon <a href="http://www.miitbeian.gov.cn/" target="_blank">###</a> </p>
</footer>
<script src="../Public/js/silder.js"></script>
</body>
</html>