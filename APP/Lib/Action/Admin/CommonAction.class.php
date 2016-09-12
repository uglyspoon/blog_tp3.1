<?php
Class CommonAction extends Action{
	Public function _initialize(){
		if(!isset($_SESSION['uid'])){
			$this->redirect(GROUP_NAME.'/Login/index');
		}
		// $notAuth = in_array(MODULE_NAME,explode(',', C('NOT_AUTH_MODULE'))) || 
		// in_array(ACTION_NAME,explode(',',C('NOT_AUTH_ACTION')));
		// if(C('USER_AUTH_ON') && !$notAuth){
		// 	import('ORG.Util.RBAC');
		// 	/*GROUP_NAME*///当项目是应用分组才需要填,单入口则不需要
		// 	RBAC::AccessDecision(GROUP_NAME) || $this->error('抱歉 ,你没有此模块的权限!');
		// }
	}
}
?>