<?php
/*用户与角色的关联模型*/
Class UserRelationModel extends RelationModel{
	Protected $tableName  = 'user';/*定义主表名称*/
	/*定义关联名称*/
	Protected $_link = array(
		'role' =>array(
			'mapping_type'=>MANY_TO_MANY, //多对多关系
			'foreign_key' =>'user_id', //主表在中间表的名称
			'relation_id' =>'role_id', //附表在中间表的名称
			'relation_table'=>'think_role_user', //中间表
			'mapping_fields' =>'id,name,remark', //显示的字段 
			)
		);
}
?>