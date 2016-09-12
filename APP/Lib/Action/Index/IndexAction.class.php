<?php
Class IndexAction extends Action{
	Public function index(){
			$blog= D('BlogRelation')->relation(true)->order('click DESC')->select();
			$tj =array();
			$zd =array();
			foreach($blog as $v){
				foreach($v['attr'] as $vo){
					if($vo['name'] == '推荐' && count($tj)<6)
					$tj[] = $v;
					if($vo['name'] =='置顶' && count($zd)<5)
					$zd[] = $v;
				}
				if(count($tj)==6 && count($tj)==5) break;
			}
		$this->assign('zd',$zd);
		$this->assign('tj',$tj);
		$this->display();
	}
	Public function about(){
		$where = array('type'=>1,'del'=>0);
		$blog = D('BlogView')->getBlogs($where);
		$this->blog = $blog[0];
		$this->display();
	}
	Public function wish(){
		$wish = M('wish')->select();
		$this->assign('wish',$wish)->display();
	}
	public function addWish(){
		if(!IS_AJAX) halt('页面不存在!'); //_404('页面不存在 ');
		 $data = array(
		 'username' =>I('username'),
		 'content' =>I('content','',''),
		 'time' => time(),
		 );
		 if($id = M('wish')->data($data)->add()){
		 	 $data['id'] = $id;
		 	 $data['content'] = replace_phiz($data['content']);
		 	 $data['time'] = date('Y-m-d H:i:s',$data['time']);
		 	 $data['status'] = 1;
		 	 $this->ajaxReturn($data,'json');
		 }else{
		 	$this->ajaxReturn(array('status'=>0),'json');
		 }
	}
	public function time(){
		$time =M('time')->order('time DESC')->select();
		$this->assign('time',$time)->display();
	}
}
?>