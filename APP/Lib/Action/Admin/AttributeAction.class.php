<?php
Class AttributeAction extends CommonAction{
	/*属性列表*/
	Public function index(){
		$attr = M('attr')->select();
		$this->assign('attr',$attr)->display();
	}
	/*添加属性视图*/
	Public function addAttr(){
		$this->display();
	}
	/*添加属性表单处理*/
	Public function addAttrHandle(){
		if(M('attr')->add($_POST)){
			$this->success('添加成功!',U(GROUP_NAME.'/Attribute/index'));
		}else $this->error('添加失败!');
	}	
}
?>
