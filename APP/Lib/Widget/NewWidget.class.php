<?php
Class NewWidget extends Widget{
	Public function render($data){
		$limit = $data['limit'];
		import('Class.Category',APP_PATH);
		$cid = $data['cid'];
		$cate= M('cate')->order('sort')->select();
		$cids =Category::getChildsId($cate,$cid);
		$cids[]= $cid;
		$field = array('id','title');
		if($cid){
			$where =  array('cid'=>array('IN',$cids));
		}else  $where = '';
		$data['news'] = M('blog')->where($where)->field($field)->order('time DESC')->limit($limit)->select();
		return $this->renderFile('',$data);
	}
}
?>