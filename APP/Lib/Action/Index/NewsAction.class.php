<?php
Class NewsAction extends Action{
	Public function index(){
		import('Class.Category',APP_PATH);
		import('ORG.Util.Page');
		$cate= M('cate')->order('sort')->select();
		$id = I('id','','intval');
		$parents = Category::getParents($cate,$id);
		$where = array('cid'=>$id);
		$count = M('blog')->where($where)->count();
		$page = new Page($count,8);
		$page->setConfig('header','篇文章');
		$page->setConfig('prev','<');
		$page->setConfig('next','>');
		$limit = $page->firstRow.','.$page->listRows;
		$blog = D('BlogView')->getBlogs($where,$limit);
		$info = M('cate')->where(array('id'=>$id))->find();
		$this->id = $id;
		$this->remark = $info['remark'];
		$this->parents = $parents;
		$this->assign('blog',$blog);
		$this->page = $page->show();
		$this->display();
	}
	Public function Sub(){
		import('Class.Category',APP_PATH);
		import('ORG.Util.Page');
		$cate= M('cate')->order('sort')->select();
		$id = I('id','','intval');
		$parents = Category::getParents($cate,$id);
		$blog = M('blog')->where(array('cid'=>$id))->limit($limit)->select();
		/*获取remark*/
		$info = M('cate')->where(array('id'=>$id))->find();
		$this->remark = $info['remark'];

		$this->id = 2;  /*待修改 改成动态的传递父类的id*/
		$this->parents = $parents;
		// p($parents);die;
		$this->assign('blog',$blog);
		$this->display('index');
	}
}
?>