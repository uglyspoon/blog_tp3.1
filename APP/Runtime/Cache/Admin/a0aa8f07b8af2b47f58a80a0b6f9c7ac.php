<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>用户登录</title>
<link href="../Public/login/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<script type="text/javascript" src="__PUBLIC__/jquery.js"></script>
<script type="text/javascript">
	var URL = "<?php echo U(GROUP_NAME.'/Login/verify','','');?>";
	$(function(){
		$('#code').click(function(event) {
			$("#code").attr("src",URL+'/'+Math.random());
		});
	});
</script>
</head>
<body>
<h1>后台登陆</h1>
<div class="login">
	    <div class="rib"> </div>
	    <form name="form_login" action="<?php echo U(GROUP_NAME.'/Login/login');?>" method="post">
			<input type="text" name="username" id="username" value="输入用户名" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '输入用户名';}">
			<input type="password" name="userpwd"  id="userpwd">
			<input type="text" name="confirm_code" id ="confirm_code" value="输入验证码" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '输入验证码';}">
			<img alt="验证码" id="code" src="<?php echo U(GROUP_NAME.'/Login/verify','','');?>" style="padding-left: 5px; line-height: 48px; vertical-align: middle;" >
			<input type="submit" name="login" value="登 录" ><br>
			<!--
			<a  id="log_a" href="#"><span id="msg">没有帐号?点我注册</span></a>
			-->
	    </form>
</div>
<div class="copyright">
	<p>Edit by <a href="#" target="_blank"> Spoon </a></p>
</div>
</body>
</html>