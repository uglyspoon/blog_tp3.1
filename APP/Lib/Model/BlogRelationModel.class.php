<?php 
Class BlogRelationModel extends RelationModel{
	Protected $tableName='blog';
	Protected $_link=array(
		'attr' => array(
			'mapping_type'=>MANY_TO_MANY,
			'mapping_name'=> 'attr',
			'foreign_key' =>'bid',
			'relation_foreign_key'=>'aid',
			'relation_table'=>'tp_blog_attr',
			),
		'cate'=>array(
			'mapping_type'=>BELONGS_TO,
			'foreign_key'=>'cid',
			'mapping_fields'=>'name',  //较多使用
			'as_fields'=>'name:cate', //较少使用
			),
		);
	Public function getBlogs($limit = null,$where=null){
		// p($where);p(1111);
		// p($limit);

		$field = array('del'); //field($field,true) 表示显示排除$field数组之外的所有字段
		return $this->field($field,true)->relation(true)->order('id ASC')->where($where)->limit($limit)->select(); //true表示关联全部表/若单独 ,则输入要关联的表的名称
	}
}
?>