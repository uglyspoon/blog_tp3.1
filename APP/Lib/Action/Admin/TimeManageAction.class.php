<?php
Class TimeManageAction extends Action{
	Public function index(){
		import('ORG.Util.Page');
		$count =M('time')->count();
		$page = new Page($count,10);
		$limit = $page->firstRow . ',' .$page->listRows;
		$time = M('time')->order('time DESC')->limit($limit)->select();
		$this->time =$time;
		// p($wish); 
		$this->page = $page->show();
		$this->display();
	}
	Public function addtime(){
		$this->display();
	}
	Public function addTimeHandle(){
		$_POST['time'] = strtotime($_POST['time']);
		if(M('time')->add($_POST)){
			$this->success('添加成功!',U(GROUP_NAME.'/TimeManage/index'));
		}else $this->error('添加失败!');
	}
}
?>