<?php
return array(
	/*应用分组*/
	'APP_GROUP_LIST'=>'Index,Admin',
	/*默认应用*/
	'DEFAULT_GROUP' =>'Index',
	/*'APP_GROUP_MODE' =>1,
	'APP_GROUP_PATH' =>'Modules',*/
	//数据库参数
	'DB_HOST' => '127.0.0.1',
	'DB_USER' => 'root',
	'DB_PWD' =>'',
	'DB_NAME' =>'blog',
	'DB_PREFIX' =>'tp_',
	//tpl模板点语法 默认解析  (可提高解析性能)
	'TMPL_VAR_IDENTIFY' =>'array',
	/*view模板解析重构*/
	'TMPL_FILE_DEPR'=>'_',
	/*扩展配置文件*///(验证码)
	'LOAD_EXT_CONFIG' =>'verify',
	//'SHOW_PAGE_TRACE'=>true,
	'URL_MODEL' =>2,
	'URL_ROUTER_ON' =>true,
	'URL_ROUTE_RULES'=>array(
		'cate/:id\d' =>'Index/News/index',
		'wish' =>'Index/Index/wish',
		'time'=>'Index/Index/time',
		'article/:id\d' =>'Index/Show/index',
		),
	'URL_HTML_SUFFIX'=>'',
);
?>