<?php
Class BlogViewModel extends ViewModel{
	Protected $viewFields= array(
		/*关联blog表 ,设置要读取的字段*/
		'blog'=>array(
			'id','title','time','click','summary','coverpic','author','content',
			'_type' =>'LEFT' /*关联视图模式 JOIN*/
			),
		'cate'=>array(
			/*关联字段和关联条件*/
			'name','type',
			'_on'=>'blog.cid = cate.id',
			),
		);
	/*关联模型是发送多条SQL语句组合数据*/
	/*而视图模型是发送一条Join语句组合表显示*/
	Public function getBlogs($where,$limit){
		return $this->where($where)->limit($limit)->select();
	}
}
?>