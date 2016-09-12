<?php
Class ShowAction extends Action{
	Public function index(){
		$id=I('id','','intval');
		/*click 自增1*/
		M('blog')->where(array('id'=>$id))->setInc('click');
		$field=array('id','title','time','content','cid','author');
		$blog = M('blog')->field($field)->find($id);
		$cid = $blog['cid'];
		/*上一篇博客的信息*/
		$map['id'] =array('LT',$id);
		$map['cid'] = array('EQ',$cid);
		$map['del'] = array('EQ',0);
		$blog_pre= M('blog')->where($map)->order('id ASC')->field(array('id','title'))->find();
		$this->pre = $blog_pre;
		/*下一篇博客 的信息*/
		$map['id'] = array('GT',$id);
		$this->next= M('blog')->where($map)->order('id desc')->field(array('id','title'))->find();
		/*p($this->pre);
		p($this->next);die;*/
		/**/
		$map['id'] =array('LT',$id);
		$map['cid'] = array('EQ',$cid);
		$map['del'] = array('EQ',0);
		$blog_pre= M('blog')->where($map)->order('id ASC')->field(array('id','title'))->find();
		import('Class.Category',APP_PATH);
		$cate = M('cate')->order('sort')->select();
		/*获取评论*/
		$comment = M('comment')->where(array('bid'=>$id))->select();
		$this->parent = Category::getParents($cate,$cid);
		//p($parent);
		$this->comment = $comment;
		$this->id = $id;
		$this->assign('blog',$blog);
		$this->display();
	}
	Public function clicknum(){
		$id =I('id','','intval');
		$where =array('id'=>$id);
		$click = M('blog')->where($where)->getField('click');
		M('blog')->where($where)->setInc('click');
		echo 'document.write('.$click.')';
	}
	Public function addComment(){
		$bid = I('id');
		//p($_POST);die;
		$data = array(
			'bid'=> $bid,
			'content' =>I('comment'),
			'time'=>time(), 
			'username'=>'游客'.mt_rand(10000,99999)
			);
		if(M('comment')->add($data)){
			$this->success('评论成功！');
		}else $this->error('评论失败！');
	}
}
?>