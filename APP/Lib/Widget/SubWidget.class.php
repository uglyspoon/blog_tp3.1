<?php
Class SubWidget extends Widget{
	Public function render($data){
		$pid = $data['id'];
		$field=array('id','name');
		$data['sub'] = M('cate')->where(array('pid'=>$pid))->field($field)->select();
		return $this->renderFile('',$data);
	}
}
?>