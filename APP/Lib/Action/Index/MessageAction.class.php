<?php
Class MessageAction extends Action{
	public function index(){
		import('ORG.Util.Page');
		$count=M('message')->count();
		$page = new Page($count,20);
		$limit = $page->firstRow.','.$page->listRows;
		$message = M('message')->limit($limit)->select();
		$page->setConfig('header','条留言');
		$page->setConfig('theme','%totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %downPage% %linkPage% %nextPage% %end%
'
);
		$this->page = $page->show();
		$this->assign('message',$message)->display();
	}
	public function addMessage(){
        $m=M("message");
        $data = $m->create();
        if($_POST['title'] == '' || $_POST['name'] == '' || $_POST['content'] == ''){
            $this->error("都填写了吗？仔细检查");
        }
        $color = array("#18A689","#1A7BB9","#21B9BB","#F7A54A","#EC4758","#000000");
        $number = rand(0,5);
        $data['color']=$color[$number];
        $data['ip']=$_SERVER["REMOTE_ADDR"];
        $data['time']= time();
        if($m->add($data)){
            $this->success("留言成功!",U('Index/Message/index'));
        }else{
            $this->error("留言失败！");
        }
    }
}
?>