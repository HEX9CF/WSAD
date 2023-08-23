<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends \Think\Controller {
	function __construct(){
		parent::__construct();
		//判断SESSION中的AID是否存在
		$this->aid = session('aid');

		if( $this->aid < 1 ){
				return $this->error("请登录后再访问本页面","/Admin/Login/index");
		}
		//判断AID是否有效
		$this->user = D("admin")->where( array('aid'=>$this->aid) )->find();
		if( !$this->user ){
			return $this->error("账号无效","/Admin/Login/index");
		}

	}

}




