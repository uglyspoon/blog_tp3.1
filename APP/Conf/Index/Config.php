<?php
	return array(
		//'APP_AUTOLOAD_PATH'=>'@.TagLib',
		//'TAGLIB_BUILD_IN'=>'Cx,Hd',
		'HTML_CACHE_ON'=>true, //开启静态缓存
		'HTML_CACHE_RULES'=>array(
			'Show:index'=>array('{:module}_{:action}_{id}',10),//设置静态缓存规则  {:module}_控制器名称 {:action}方法 0为永久有效，没有失效
			),
		);
?>