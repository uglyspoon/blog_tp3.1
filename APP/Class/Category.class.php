<?php 
Class Category{
	/*组合一维数组*/
	Static Public function unlimitedForLevel($cate,$html='&emsp;——&nbsp;',$pid=0,$level=0){
		$arr =array();
		foreach($cate as $v){
			if($pid==$v['pid']){
				$v['level'] =$level+1;
				$v['html'] =str_repeat($html, $level);
				$arr[] = $v;
				$arr = array_merge($arr,self::unlimitedForLevel($cate,$html,$v['id'],$level+1)); 
			}
		}
		return $arr;
	}
	/*组合多维数组*/
	Static Public function unlimitedForLayer($cate,$pid=0){
		$arr = array();
		foreach($cate as $v){
			if($v['pid'] == $pid){
				$v['child']=self::unlimitedForLayer($cate,$v['id']);
				$arr[]=$v; 
			}
		}
		return $arr;
	}
	/*传递一个子类id,返回所有父级分类*/
	Static Public function getParents($cate,$id){
		$arr =array();
		foreach($cate as $v){
			if($v['id'] == $id){
				$arr[] = $v;
				$arr = array_merge(self::getParents($cate,$v['pid']),$arr);
			}
		}
		return $arr;
	}
	/*传递一个父级分类id,返回所有子级分类id*/
	Static Public function getChildsid($cate,$pid){
		$arr = array();
		foreach($cate as $v){
			if($v['pid'] == $pid){
				$arr[] = $v['id'];
				$arr = array_merge($arr,self::getChilds($cate,$v['id']));
			}
		}
		return $arr;
	}
	/*传递一个父级分类id,返回所有子级分类数组*/
	Static Public function getChilds($cate,$pid){
		$arr = array();
		foreach($cate as $v){
			if($v['pid'] == $pid){
				$arr[] = $v;
				$arr = array_merge($arr,self::getChilds($cate,$v['id']));
			}
		}
		return $arr;
	}
}
?>