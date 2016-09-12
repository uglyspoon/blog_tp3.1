<?php
Class CategoryAction extends CommonAction{
	Public function index(){
		import('Class.Category',APP_PATH);	
		$cate=M('cate')->order('sort ASC')->select();
		$cate =Category::unlimitedForLevel($cate);
		//$cate =Category::getChilds($cate,2);
		$this->assign('cate',$cate)->display();
	}
	Public function addCate(){
		$this->pid= I('pid',0,'intval');
		$this->display();
	}
	Public function addCateHandle(){
		if(M('cate')->add($_POST)){
			$this->success('添加成功!',U(GROUP_NAME.'/Category/index'));
		}else $this->error('添加失败!');
	}
	Public function sortCate(){
		$db = M('cate');
		foreach ($_POST as $k => $v) {
			$db->where(array('id' =>$k))->setField('sort',$v);
		}
		$this->redirect(GROUP_NAME.'/Category/index');
	}
}
?>