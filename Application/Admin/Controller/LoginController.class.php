<?php 
namespace Admin\Controller;
use Think\Controller;
class LoginController extends \Think\Controller {

	function __construct(){
		parent::__construct();
		$this->setting = D("Admin/Setting");
		$this->set = $this->setting->getall();
	}

	//生成验证码
	function verify(){  
			$Verify = new \Think\Verify();  
			$Verify->fontSize = 30;  
			$Verify->length   = 10;  
			$Verify->useNoise = true;  
			//$Verify->codeSet = '';  
			//$Verify->imageW = 200;  
			$Verify->imageH = 100;  
			$Verify->expire = 600;  
			$Verify->useCurve = true;
			$Verify->useImgBg = true;
			$Verify->entry(); 
	} 

	/*
	 * 后台登录页面
	 */ 
	public function index(){
		$act = I("get.act");
		$valuser = I("get.valuser");
		$valpw = I("get.valpw");
		if( $act == 'chk' ){
			$admin = I("post.admin");
			$adminpw = I("post.adminpw");
			//判断验证码
			function check_verify($code, $id = ''){
				$verify = new \Think\Verify();
				return $verify->check($code, $id);
			}
			$code= I('post.code');
			 if(check_verify($code) == false){
			$this->error('验证码错误',"/Admin/Login/index?valuser=".$admin."&valpw=".$adminpw);
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
			  $adminpw = md5($adminpw);
			  $x++;
			}
			//加密完成

			$adminmodel = D('admin');
			$where = array(
				'admin' => $admin,
				'adminpw' => $adminpw,
			);

			$user = $adminmodel->where( $where )->find();
			if( !$user ){
				return $this->error("账号不存在或密码错误","/Admin/Login/index");
			}else{
				session("aid",$user['aid']);
				session("admin",$user['admin']);
				return $this->success("登录成功","/Admin/Index/index");
			}
			
		} 
		$this->assign("valpw",$valpw);
		$this->assign("valuser",$valuser);
		$this->display();
	}
	
	function logout(){
		session('aid',null);
		return $this->error("退出成功","/Admin/Login/index");
	}
}