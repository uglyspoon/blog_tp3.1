<?php
function p($arr){
	dump($arr,1,'<pre>',0);
}
	//发布内容表情替换
/*（注：为了部署安全考虑，../Public和__TMPL__不再建议使用）  坑爹啊  我就用了这2个,全部失效了 郁闷了好久 我的天啊!!*/
function replace_phiz($content){
	preg_match_all('/\[.*?\]/is',$content,$arr);
	if($arr[0]){
		$phiz = F('phiz','','./Data/');
		foreach ($arr[0] as $v) {
			foreach($phiz as $key =>$value){
				if($v == '['.$value.']'){	
					$content = str_replace($v,'<img src="'.__ROOT__.'/App/Tpl/Index/Public/wish/Images/phiz/'.$key.'.gif"/>',$content);
				break;
				}
			}
		}
	}
	return $content;
}

?>