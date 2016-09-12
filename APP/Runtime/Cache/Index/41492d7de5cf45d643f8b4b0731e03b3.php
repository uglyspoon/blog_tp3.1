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
<link href="../Public/css/new.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="../Public/js/modernizr.js"></script>
<![endif]-->
<!-- 返回顶部调用 begin -->
<link href="../Public/css/lrtk.css" rel="stylesheet" />
<script type="text/javascript" src="../Public/js/jquery.js"></script>
<script type="text/javascript" src="../Public/js/js.js"></script>
<!-- 返回顶部调用 end-->
</head>
<link rel="stylesheet" type="text/css" href="../Public/css/comment.css">
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
  <h1 class="t_nav"><span>您当前的位置：<a href="<?php echo U('/');?>">首页</a>>
    <?php if(is_array($parent)): foreach($parent as $key=>$v): ?><a href="<?php echo U('cate/'.$v['id']);?>"><?php echo ($v["name"]); ?></a>><?php endforeach; endif; ?>
    <a href="<?php echo U('article/'.$blog['id']);?>"><?php echo ($blog["title"]); ?></a>
  </span></h1>
  <div class="index_about">
    <h2 class="c_titile"><?php echo ($blog["title"]); ?></h2>
    <p class="box_c"><span class="d_time">发布时间：<?php echo (date('Y-m-d H:i',$blog["time"])); ?></span><span>作者：<a href='#'><?php echo ($blog["author"]); ?></a></span><span>点击数:<script type="text/javascript" src="<?php echo U(GROUP_NAME.'/Show/clickNum',array('id'=>$blog['id']));?>"></script></span></p>
    <ul class="infos">
      <?php echo ($blog["content"]); ?>
    </ul>
    <div class="nextinfo">
    <?php if($pre): ?><p>上一篇：<a href='<?php echo U("article/".$pre["id"]);?>'><?php echo ($pre["title"]); ?></a></p>
    <?php else: ?>
<p>上一篇：没有上一篇了</p><?php endif; ?>
    <?php if($next): ?><p>下一篇：<a href='<?php echo U("article/".$next["id"]);?>'><?php echo ($next["title"]); ?></a></p>
    <?php else: ?>
<p>下一篇：没有下一篇了</p><?php endif; ?>
    </div>
    

<div class="blank"></div>
<!--  Comment BEGIN -->
<div class="ds-thread" id="ds-thread">
<form method="post" action="<?php echo U(GROUP_NAME.'/Show/addComment');?>">
  <div class="ds-reset" id="ds-reset">
     <ul class="ds-comments">
     <?php if(is_array($comment)): foreach($comment as $key=>$v): ?><li class="ds-post">
          <div class="ds-post-self">
            <div class="ds-avatar"><a href=""><img src=""></a> </div>
            <div class="ds-comment-body">
              <div class="ds-comment-header"><div class="ds-user-name"><?php echo ($v["username"]); ?></div></div>
              <p><?php echo ($v["content"]); ?></p>
              <div class="ds-comment-footer ds-comment-actions">
                <span class="ds-time"><?php echo (date('Y-m-d H:i:s',$v["time"])); ?></span>
                <a class="ds-post-reply" href="javascript:void(0);"><span class="ds-icon ds-icon-reply"></span>回复</a>
                <a class="ds-post-likes" href="javascript:void(0);"><span class="ds-icon ds-icon-like"></span>顶</a>
              </div>
            </div>
          </div>
          <!--   评论中的评论
          <ul class="ds-children" id="ds-children">
            <li class="ds-post">
              <div class="ds-post-self">
                <div class="ds-avatar"><img src="../Public/user.jpg" ></div>
                <div class="ds-comment-body">
                  <div class="ds-comment-header"><div class="ds-user-name">username</div></div>
                  <p>评论内容</p>
                  <div class="ds-comment-footer ds-comment-actions">
                    <span class="ds-time">2007-7-7</span>
                    <a class="ds-post-reply" href="javascript:void(0);"><span class="ds-icon ds-icon-reply"></span>回复
                    </a>
                    <a class="ds-post-likes" href="javascript:void(0);"><span class="ds-icon ds-icon-like"></span>顶
                    </a>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          -->
        </li><?php endforeach; endif; ?>
     </ul>
     <div class="ds-paginator">
       <div class="ds-border"></div>
       <a data-page="1" href="javascript:void(0);" class="ds-current">1</a>
       <a data-page="2" href="javascript:void(0);">2</a>
       <a data-page="3" href="javascript:void(0);">3</a>
       <a data-page="4" href="javascript:void(0);">4</a>
       <a data-page="5" href="javascript:void(0);">5</a>
       <span class="page-break">...</span>
       <a data-page="12" href="javascript:void(0);">12</a>
     </div>
     <div class="ds-replybox">
       <a class="ds-avatar" href="javascript:void(0);" onclick="return false"><img src="http://ds.cdncache.org/avatar-50/587/39630.jpg" alt=""></a>
       <form method="post">
         <input type="hidden" name="id" value="<?php echo ($id); ?>">          
         <div class="ds-textarea-wrapper ds-rounded-top">
           <textarea name="comment"  placeholder="说点什么吧…" style="height: 54px;"></textarea>
           <pre class="ds-hidden-text"></pre>
         </div>
         <div class="ds-post-toolbar">
           <div class="ds-post-options ds-gradient-bg">
             <span class="ds-sync"></span>
           </div>
           <button class="ds-post-button" type="submit">发布</button>
           <div class="ds-toolbar-buttons">
             <a class="ds-toolbar-button ds-add-emote" title="插入表情"></a>
           </div>
         </div>
       </form>
     </div>
  </div>
  </form>
</div>
<!-- Comment END -->
  </div>
  <aside class="right">
 <?php echo W('Sub',array('id'=>2));?>
<div class="blank"></div>
    <div class="news">
      <?php echo W('New',array('limit'=>8));?>
      <?php echo W('Hot',array('limit'=>5));?>
    </div>
<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
  <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
  <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
  <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
</div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='../Public/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<div class="blank"></div>
  </aside>
</article>
<div id="tbox"> <a id="togbook" href="message.html"></a> <a id="gotop" href="javascript:void(0)" style="display: block;"></a> 
</div>
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