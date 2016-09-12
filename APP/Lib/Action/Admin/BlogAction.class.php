<?php
Class BlogAction extends CommonAction{
	/*博客文章展示首页*/
	Public function index(){
		//$field = array('id','content','time');//需要的字段
		//->field($field,true)  //除了$field里的字段都读取
		import('ORG.Util.Page');
		$count = M('blog')->where(array('del'=>0))->count();
		$page = new Page($count,15);
		$limit = $page->firstRow.','.$page->listRows;
		/*只选出type为1 or 2的目录*/
		$map['type'] = array('in',array(1,2));
		$cate = M('cate')->where($map)->select();
		$keywords = trim(I('keywords'));
		if($_POST['cate-src']){
			$search = array('cid'=>I('cate-src'));
		}
		if($keywords !=null){
		$search['title'] = array('like','%'.$keywords.'%');
		}
		$search['del']  = 0;
		$blog = D('BlogRelation')->getBlogs($limit,$search);
		$this->assign('blog',$blog);
		$page->setConfig('prev','«');
		$page->setConfig('next','»');
		$page->setConfig('theme'," <li>%prePage%</li> <li>%upPage%</li> %linkPage% <li>%downPage%</li> <li>%nextPage%</li>"
);
		$this->page = $page->show();
		$this->count=$count;
		$this->cate= $cate;
		$this->display();
	}
	/*回收站展示页面*/
	Public function trash(){
		import('ORG.Util.Page');
		$count = M('blog')->where(array('del'=>1))->count();
		$page = new Page($count,5);
		$limit = $page->firstRow.','.$page->listRows;
		/*只选出type为1 or 2的目录*/
		$map['type'] = array('in',array(1,2));
		$cate = M('cate')->where($map)->select();
		$keywords = trim(I('keywords'));
		if($_POST['cate-src']){
			$search['cid'] = I('cate-src');
		}
		if($keywords !=null){
		$search['title'] = array('like','%'.$keywords.'%');
		}
		$search['del']  = 1;
		$blog = D('BlogRelation')->getBlogs($limit,$search);
		$this->assign('blog',$blog);
		$page->setConfig('prev','«');
		$page->setConfig('next','»');
		$page->setConfig('theme'," <li>%prePage%</li> <li>%upPage%</li> %linkPage% <li>%downPage%</li> <li>%nextPage%</li>"
);
		$this->page = $page->show();
		$this->count=$count;
		$this->cate= $cate;
		$this->display('index');
	}
	/*添加博文*/
	Public function addBlog(){
		/*博文所属分类*/
		import('Class.Category',APP_PATH);
		$cate= M('cate')->order('sort')->select();
		$cate= Category::unlimitedForLevel($cate);
		$this->assign('cate',$cate);
		/*博文属性*/
		$attr = M('attr')->select();
		$this->assign('attr',$attr);
		$this->display();
	}
	/*添加博文处理*/
	Public function addBlogHandle(){
		//D('BlogRelation');
		//p($_POST);die;
		$data=array(
			'title' =>I('title'),
			'author'=>I('author'),
			'summary' =>I('summary'),
			'coverpic'=>I('coverpic'),
			'content'=>I('content','',''),
			'time'=>time(),
			'click'=>I('click','','intval'),
			'cid'=>I('cid','','intval'), 
			'status'=>I('status','1','intval')
			);
/*		关联模型处理 3.13BUG
		if(isset($_POST['attrs'])){
			$data['attr']=array();
			foreach($_POST['attrs'] as $v){
				 $data['attr'][] = $v;
			}
		}
		D('BlogRelation')->relation(true)->add($data);*/
		if($bid = M('blog')->add($data)){
			if(isset($_POST['aid'])){
				$sql='INSERT INTO `'.C('DB_PREFIX').'blog_attr` (bid,aid) VALUES';
				foreach($_POST['aid'] as $v){
					$sql .= '('.$bid.','.$v.'),';
				}
				$sql= rtrim($sql,',');
				M('blog_attr') ->query($sql);
			}
			$this->success('添加成功!',U(GROUP_NAME.'/Blog/index'));
		}else $this->error('添加失败!');
	}
	/*编辑博文*/
	Public function editBlog(){
		$id = I('id','','intval');
		/*博文所属分类*/
		import('Class.Category',APP_PATH);
		$cate= M('cate')->order('sort')->select();
		$cate= Category::unlimitedForLevel($cate);
		$this->assign('cate',$cate);
		/*博文属性*/
		$attr = M('attr')->select();
		$attr_selected = M('blog_attr')->where(array('bid'=>$id))->select();
		$this->assign('attr',$attr);
		/*博文信息*/
		$blog = M('blog')->where(array('id'=>$id))->select();
		$this->assign('blog',$blog[0]);
		//p($blog);die;
		$this->assign('status',$blog[0]["status"]);
		$this->assign('attrs',$attr_selected);
		/*p($attr_selected);
		die;*/
		$this->display('addBlog');
	}
	/*编辑博文处理*/
	Public function editBlogHandle(){
		$bid = I('id','','intval');
		$data=array(
			'title' =>I('title'),
			'author'=>I('author'),
			'summary' =>I('summary'),
			'coverpic' =>I('coverpic'),
			'content'=>I('content','',''),
			'time'=>time(),
			'click'=>I('click','','intval'),
			'cid'=>I('cid','','intval'), 
			'status'=>I('status','1','intval')
			);
		if(M('blog')->where(array('id'=>$bid))->save($data)){
			$sql_del = 'delete from `'.C('DB_PREFIX').'blog_attr` where bid = '.$bid;
			M('blog_attr')->query($sql_del);
			if(isset($_POST['aid'])){
				$sql='INSERT INTO `'.C('DB_PREFIX').'blog_attr` (bid,aid) VALUES';
				foreach($_POST['aid'] as $v){
					$sql .= '('.$bid.','.$v.'),';
				}
				$sql= rtrim($sql,',');
				M('blog_attr') ->query($sql);
			}
			$this->success('修改成功!',U(GROUP_NAME.'/Blog/index'));
		}else $this->error('修改失败!');
	}
	/*博文删除&&还原处理*/  
	Public function toTrash(){
		$id =  I('id','','intval');
		$type = I('type','','intval');
		$msg = $type?'删除':'还原';
		$url = $type?'index':'trash';
		$update=array(
			'id'=>$id,
			'del'=>$type,
			);
		if(M('blog')->save($update)){
			$this->success($msg.'成功!',U(GROUP_NAME.'/Blog/'.$url));
		}else $this->error($msg.'失败!请联系管理员修复!');
	}
	/*彻底删除博文*/
	Public function delete(){
		$id = I('id','','intval');
		//D('BlogRelation')->relation('attr')->delete($id)/*关联模型删除博文同时删除博文的相关属性 ,可惜3.13版本的tp框架有问题 会全部删除attr表*/
		if(M('blog')->delete($id)){
			M('blog_attr')->where(array('bid'=>$id))->delete();
			$this->success('已彻底删除!',U(GROUP_NAME.'/Blog/trash'));
		}else $this->error('删除失败!');
	}
}
?>