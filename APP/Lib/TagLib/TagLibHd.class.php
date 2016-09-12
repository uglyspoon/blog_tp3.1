<?php
import('TagLib');
Class TagLibHd extends TagLib{
	Protected $tags =array(
		'nav'=>array('attr'=>'order','close'=>1),
		);
	Public function _nav($attr,$content){
		$attr=$this->parseXmlAttr($attr);
		$str = <<<str
<?php
	\$cate = M('cate')->order("{$attr['order']}")->select();
	import('Class.Category',APP_PATH);
	\$cate = Category::unlimitedForLayer(\$cate);
	foreach(\$cate as \$v) :
		extract(\$v);
?>
str;
		$str .= $content;
		$str.='<?php endforeach; ?>';
		return $str;
	}
}
?>