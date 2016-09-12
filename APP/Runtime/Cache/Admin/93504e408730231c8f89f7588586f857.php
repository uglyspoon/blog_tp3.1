<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js fixed-layout">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>管理员欢迎页面</title>
<meta name="description" content="这是一个 index 页面">
<meta name="keywords" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="icon" type="image/png" href="../Public/assets/i/favicon.png">
<link rel="apple-touch-icon-precomposed" href="../Public/assets/i/app-icon72x72@2x.png">
<meta name="apple-mobile-web-app-title" content="Amaze UI" />
<link rel="stylesheet" href="../Public/assets/css/amazeui.min.css"/>
<link rel="stylesheet" href="../Public/assets/css/admin.css">
<!-- slice box -->
<link rel="stylesheet" type="text/css" href="../Public/slicebox/css/demo.css" />
<link rel="stylesheet" type="text/css" href="../Public/slicebox/css/slicebox.css" />
<link rel="stylesheet" type="text/css" href="../Public/slicebox/css/custom.css" />
<script type="text/javascript" src="../Public/slicebox/js/modernizr.custom.46884.js"></script>
<!-- end -->
</head>
<body>
<!-- content start -->
<div class="admin-content">
  <div class="admin-content-body">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">欢迎</strong> / <small>Elegant Show</small></div>
    </div>
    <?php if($show): ?><div class="more">
        <ul id="sb-examples">
            <li>View More :</li>
          <?php if(is_array($picfolders)): foreach($picfolders as $key=>$v): ?><li class="<?php if($picpath == $v): ?>selected<?php endif; ?>"><a href="<?php echo U(GROUP_NAME.'/Index/welcome',array('picpath'=>$v));?>"><?php echo ($v); ?></a></li><?php endforeach; endif; ?>
        </ul>
    </div><?php endif; ?>
    <!-- slice box start -->
    <div class="container">
      <div class="wrapper">
        <ul id="sb-slider" class="sb-slider">
          <li> <a href="#" ><img src="../Public/slicebox/images/<?php echo ($picpath); ?>/1.jpg" alt="image1"/></a>
            <div class="sb-description">
              <h3>Creative Lifesaver</h3>
            </div>
          </li>
          <li> <a href="#" ><img src="../Public/slicebox/images/<?php echo ($picpath); ?>/2.jpg" alt="image2"/></a>
            <div class="sb-description">
              <h3>Honest Entertainer</h3>
            </div>
          </li>
          <li> <a href="#" ><img src="../Public/slicebox/images/<?php echo ($picpath); ?>/3.jpg" alt="image1"/></a>
            <div class="sb-description">
              <h3>Brave Astronaut</h3>
            </div>
          </li>
          <li> <a href="#" ><img src="../Public/slicebox/images/<?php echo ($picpath); ?>/4.jpg" alt="image1"/></a>
            <div class="sb-description">
              <h3>Affectionate Decision Maker</h3>
            </div>
          </li>
          <li> <a href="#" ><img src="../Public/slicebox/images/<?php echo ($picpath); ?>/5.jpg" alt="image1"/></a>
            <div class="sb-description">
              <h3>Faithful Investor</h3>
            </div>
          </li>
          <li> <a href="#" ><img src="../Public/slicebox/images/<?php echo ($picpath); ?>/6.jpg" alt="image1"/></a>
            <div class="sb-description">
              <h3>Groundbreaking Artist</h3>
            </div>
          </li>
          <li> <a href="#" ><img src="../Public/slicebox/images/<?php echo ($picpath); ?>/7.jpg" alt="image1"/></a>
            <div class="sb-description">
              <h3>Selfless Philantropist</h3>
            </div>
          </li>
        </ul>
<!--
<div id="shadow" class="shadow"></div> 
-->
        <div id="nav-arrows" class="nav-arrows"> <a href="#">Next</a> <a href="#">Previous</a> </div>
<!--
<div id="nav-dots" class="nav-dots">
            <span class="nav-dot-current"></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
</div>
-->
      </div>
    </div>
    <!-- slicebox end-->
    <p class="info"><strong>您好:</strong> 欢迎来到博客管理后台,下面是站点的访问动态</p>
    <ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
      <li><a href="#" class="am-text-success"><span class="am-icon-btn am-icon-file-text"></span><br/>
        新增日志<br/>
        7</a></li>
      <li><a href="#" class="am-text-warning"><span class="am-icon-btn am-icon-briefcase"></span><br/>
        新增回复<br/>
        32</a></li>
      <li><a href="#" class="am-text-danger"><span class="am-icon-btn am-icon-recycle"></span><br/>
        昨日访问<br/>
        82</a></li>
      <li><a href="#" class="am-text-secondary"><span class="am-icon-btn am-icon-user-md"></span><br/>
        在线用户<br/>
        1</a></li>
    </ul>
  </div>
  <footer class="admin-content-footer">
    <hr>
    <p class="am-padding-left">© 2016 Hello World, Edit by UglySpoon.</p>
  </footer>
</div>
<!-- content end --> 
<script type="text/javascript" src="../Public/slicebox/js/jquery.min.js"></script> 
<script type="text/javascript" src="../Public/slicebox/js/jquery.slicebox.js"></script> 
<script type="text/javascript">
    $(function() {
        var Page = (function() {
            var $navArrows = $( '#nav-arrows' ).hide(),
                $navDots = $( '#nav-dots' ).hide(),
                $nav = $navDots.children( 'span' ),
                $shadow = $( '#shadow' ).hide(),
                slicebox = $( '#sb-slider' ).slicebox( {
                    onReady : function() {
                        $navArrows.show();
                        $navDots.show();
                        $shadow.show();
                    },
                    onBeforeChange : function( pos ) {
                        $nav.removeClass( 'nav-dot-current' );
                        $nav.eq( pos ).addClass( 'nav-dot-current' );
                    }
                } ),           
                init = function() {
                    initEvents();             
                },
                initEvents = function() {
                    // add navigation events
                    $navArrows.children( ':first' ).on( 'click', function() {
                        slicebox.next();
                        return false;
                    } );
                    $navArrows.children( ':last' ).on( 'click', function() {                 
                        slicebox.previous();
                        return false;
                    } );
                    $nav.each( function( i ) {
                        $( this ).on( 'click', function( event ) {    
                            var $dot = $( this );           
                            if( !slicebox.isActive() ) {
                                $nav.removeClass( 'nav-dot-current' );
                                $dot.addClass( 'nav-dot-current' );             
                            }  
                            slicebox.jump( i + 1 );
                            return false;
                        } );    
                    } );
                };
                return { init : init };
        })();
        Page.init();
    });
</script> 
<script src="../Public/assets/js/amazeui.min.js"></script> 
<script src="../Public/assets/js/app.js"></script>
</body>
</html>