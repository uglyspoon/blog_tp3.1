<?php
Class RBACAction extends CommonAction{
	/*
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `think_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `think_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,  //id
  `name` varchar(20) NOT NULL,   //应用名称 英文
  `title` varchar(50) DEFAULT NULL, //应用描述 中文
  `status` tinyint(1) DEFAULT '0',  //开启状态
  `remark` varchar(255) DEFAULT NULL, 
  `sort` smallint(6) unsigned DEFAULT NULL, //排序
  `pid` smallint(6) unsigned NOT NULL,  //父应用id
  `level` tinyint(1) unsigned NOT NULL, //1,2,3对应模块,控制器,方法(Admin/Index/addNode)
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `think_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,  //角色id
  `name` varchar(20) NOT NULL, //角色名称
  `pid` smallint(6) DEFAULT NULL, //
  `status` tinyint(1) unsigned DEFAULT NULL, //开启状态
  `remark` varchar(255) DEFAULT NULL,  //角色描述
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `think_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
*/
	/*用户列表*/
	Public function index(){
    $this->user = D('UserRelation')->field('pwd',true)->relation(true)->select();
    $this->display();
	}
	/*角色列表*/
	Public function role(){
    $role = M('role')->select();
    $this->assign('role',$role);
    $this->display();
	}
	/*节点列表 */
	Public function node(){
    $field = array('id','name','title','pid');
    $node = M('node')->field($field)->order('sort')->select();
    $this->node = node_merge($node);
    //p($this->node);die;
    $this->display();
	}
	/*添加用户*/
	Public function addUser(){
    $this->role =M('role')->select();
    $this->display();
	}
  /*添加用户表单处理*/
  Public function addUserHandle(){
    $user = array(
      'username'=>I('username'),
      'pwd'=>I('password','','md5'),
      'time_log' =>time(),
      'ip_log' =>get_client_ip(),
      );
    //p($user);die;
    $role= array();
    if($uid = M('user')->add($user)){
      foreach($_POST['role_id'] as $v){
          $role[] = array(
              'role_id'=>$v,
              'user_id'=>$uid,
            );
      }
      M('role_user')->addAll($role);
      $this->success('添加成功!',U('Admin/RBAC/index'));
    }else{
      $this->error('添加失败!');
    }

  }
	/*添加角色*/
	Public function addRole(){
		$this->display();
	}
	/*添加角色表单处理*/
	Public function addRoleHandle(){
		if(!IS_POST){ halt('你访问的页面并不存在!');}
    if(M('role')->add($_POST)){
      $this->success('添加角色成功!',U('Admin/RBAC/role'));
    }else $this->error('失败'); 
	}
	/*添加节点*/
	Public function addNode(){
    $this->pid= $_GET['pid']?$_GET['pid']:0;//I('pid',0,'intval');
    $this->level = I('level',1,'intval');
    switch($this->level){
      case 1:
        $this->type="应用";
        break;
      case 2:
        $this->type="控制器";
        break;
      case 3:
        $this->type="动作方法";
        break; 
     }
    $this->display();
	}
  /*添加节点表单处理*/
  Public function addNodeHandle(){
    if(M('node')->add($_POST)){
      $this->success('添加成功!',U('Admin/RBAC/node'));
    }else $this->error('添加失败!');
  }
  /*角色配置权限*/
  Public function access(){
    $rid = I('rid',0,intval);
    $field = array('id','name','title','pid');
    $node = M('node')->field($field)->order('sort')->select();
    /*原有权限*/
    $access = M('access')->where(array('role_id'=>$rid))->getField('node_id',true);
    $this->node= node_merge($node,$access);
    $this->assign('rid',$rid);
    $this->display();
  }
  /*添加角色配置权限*/
  Public function setAccess(){
    $rid = I('rid',0,intval);
    $data = array();
    $db=M('access');
    $db->where(array('role_id'=> $rid))->delete();
    foreach($_POST['access'] as $v){
      $tmp = explode('_',$v);
      $data[] = array(
        'role_id' => $rid,
        'node_id' =>$tmp['0'],
        'level' =>$tmp['1']
        );
    }
    if($db->addAll($data)){
      $this->success('修改成功',U('Admin/RBAC/role'));
    }else $this->error('添加失败');
  }
}
?>