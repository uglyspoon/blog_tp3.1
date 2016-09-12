<?php 
/*登台登录控制器*/
Class LoginAction extends Action{
	/*登录视图*/
	Public function index(){
		$this->display();
	}
	/*登录表单登录操作*/
	Public function login(){
		if(!IS_POST) halt('页面不存在');
		if(I('confirm_code','','strtolower') != $_SESSION['verify']) $this->error('验证码不正确!');
		$db= M('user');
		$user = $db->where(array('username'=>I('username')))->find();
		if(!$user) $this->error('该帐号不存在!');
		if($user['password'] != I('userpwd','','md5')) $this->error('密码错误!');
		$data=array(
				'id'=>$user['id'],
				'logtime'=>time(),
				'logip'=>get_client_ip(),
			);/*更新最后一次登录的信息*/
		$db->save($data); 
		session('uid',$user['id']);
		session('username',$user['username']);
		session('logtime',date('Y-m-d H:i:s',$user['logtime']));
		session('logip',$user['logip']);
		redirect(__GROUP__);
	}
	/*生成登录页面的验证码*/
	Public function verify(){
		import('Class.Image',APP_PATH);
		Image::verify();
	}
}
?>