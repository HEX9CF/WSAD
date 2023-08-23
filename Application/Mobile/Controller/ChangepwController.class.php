<?php
namespace Mobile\Controller;
use Think\Controller;
class ChangepwController extends Controller {

	function __construct(){
		parent::__construct();
		$this->setting = D("Admin/Setting");
		$this->set = $this->setting->getall();
	}

	public function index(){

		function get_device_type(){
			$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
			$type = 'other';
			if(strpos($agent, 'iphone') || strpos($agent, 'ipad')){
				$type = 'ios'; 
			} 
			if(strpos($agent, 'android')){
				$type = 'android'; 
			}
			return $type; 
		}
		
		if(get_device_type()!=='ios' and get_device_type()!=='android'){
			$this->redirect("User/Changepw/index");
		} 

		if(!session("uid")){
			return $this->error("请登录后再修改密码","/Mobile/Login/index");
		}
		/*
		 * 开始处理信息
		 */ 
		$act = I("get.act");
		$valoldpw = I("get.valoldpw");
		$valnewpw = I("get.valnewpw");
		$valnew2pw = I("get.valnew2pw");
		if( $act == 'chk' ){
			$uid = session("uid");
			$username = session("username");
			$oldpw = I("post.oldpw");
			$newpw = I("post.newpw");
			$new2pw = I("post.new2pw");

			//判断验证码
			function check_verify($code, $id = ''){
				$verify = new \Think\Verify();
				return $verify->check($code, $id);
			}
			$code= I('post.code');
			 if(check_verify($code) == false){
			$this->error('验证码错误',"/Mobile/Changepw/index?valoldpw=".$oldpw."&valnewpw=".$newpw."&valnew2pw=".$new2pw);
			}

			$usermodel = D('user');

			if( !$newpw ){
				return $this->error("新密码不能为空,请重新输入","/Mobile/Changepw/index?valoldpw=".$oldpw);
			}

			if( !$uid ){
				return $this->error("这也许是个错误，请告知网站管理员","/Mobile/Changepw/index");
			}

			if( !$username ){
				return $this->error("这也许是个错误，请告知网站管理员","/Mobile/Changepw/index");
			}

			//md5加密
			$settingmodel = D('setting');
			$settingwhere = array(
				'key' => 'md5key',
			);
			$setting = $settingmodel->where( $settingwhere )->find();
			$x = 0;
			$key = $setting['val'];
			while( $x <= $key ) {
			  $oldpw = md5($oldpw);
			  $newpw = md5($newpw);
			  $new2pw = md5($new2pw);
			  $x++;
			}
			//加密完成
			//var_dump($oldpw,$newpw,$new2pw);

			if( $newpw !== $new2pw ){
				return $this->error("新密码与确认密码(再输入一遍密码)不匹配,请重新输入","/Mobile/Changepw/index");
			}

			if( $oldpw == $newpw ){
				session("uid",null);
				session("username",null);
				return $this->success("修改成功,请重新登录","/Mobile/index/index");
			}

			$where = array(
				'uid' => $uid,
				'username' => $username,
				'userpw' => $oldpw,
			);
			$result = $usermodel->where( $where )->find();
			if( !$result ){
				return $this->error("账号不存在或旧密码错误,请重新输入","/Mobile/Changepw/index");
			}else{
				$insert = array(
					'userpw' => $newpw,
				);
				$result = $usermodel->where( $where )->save( $insert );
				session("uid",null);
				session("username",null);
				return $this->success("修改成功,请重新登录","/Mobile/index/index");
			}
			
		} 

		$this->assign("valoldpw",$valoldpw);
		$this->assign("valnewpw",$valnewpw);
		$this->assign("valnew2pw",$valnew2pw);
		$this->display();
	}

	function logout(){
		session('uid',null);
		session("username",null);
		return $this->error("退出成功","/Mobile/Index/index");
	}
}