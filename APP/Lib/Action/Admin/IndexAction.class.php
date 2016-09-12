<?php 
Class IndexAction extends CommonAction{
	/*后台首页控制器*/
	Public function index(){
		/*首页视图*/
		$this->display();
	}
	Public function logout(){
		/*退出登录*/
		session_unset();
		session_destroy();
		$this->redirect(GROUP_NAME.'/Login/index');
	}
	/*欢迎页面*/
	Public function welcome(){
		$this->show = false;
		$this->picfolders = array('default','anna','japan','fang');
		$picpath = I('picpath','default');
		$this->assign('picpath',$picpath);
		$this->display();
	}
}
?>