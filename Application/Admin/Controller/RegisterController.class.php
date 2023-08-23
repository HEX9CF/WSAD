<?php 
namespace Admin\Controller;
class RegisterController extends AdminController {

	function __construct(){
		parent::__construct();
		$this->setting = D("Admin/Setting");
		$this->set = $this->setting->getall();
	}

    public function index(){

		//读取博客系统设置信息
		$setting = D("setting");
		$set = $this->set;
		//读取博客数据库
		$regmodel = D("reg");
		$count = $regmodel->count();
		$page = new \Think\Page($count,$set['adminpagenum']);

		$where = array(
			'author'=>$username,
		);
		$regs = $regmodel->order('rid desc')->limit($page->firstRow.','.$page->listRows)->select();

		$this->assign("show",$page->show());
		$this->assign("regs",$regs);
		$this->display();

    }

	public function pass(){
		
		$rid = I("get.rid");
		$regmodel = D("reg");
		if(!$rid){
			return $this->error( "操作失败" ,"/Admin/Register/index");
		}

		$insert = array(
			'state' => 'true',
		);
		
		$regmodel->where( array('rid'=>$rid) )->save( $insert );

		$where = array(
			'rid'=>$rid,
		);

		$reg2 = $regmodel->where($where)->select();
		$reg = $reg2[0];

		$usermodel = D("user");
		
		$username = $reg['username'];
		$email = $reg['email'];
		$userpw = $reg['userpw'];

		$userinsert = array(
			'username' => $username,
			'email' => $email,
			'userpw' => $userpw,
		);
		
		
		$uid =  $usermodel->add( $userinsert );

		$insert2 = array(
			'uid' => $uid,
		);
		$regmodel->where( array('rid'=>$rid) )->save( $insert2 );

		return $this->redirect("/Admin/Register/index");
	}

		public function false(){
			$rid = I("get.rid");
			$regmodel = D("reg");
			if(!$rid){
			return $this->error( "操作失败" ,"/Admin/Register/index");
			}

			$where = array(
			'rid'=>$rid,
			);		
			$regmodel->where( $where )->delete();
			return $this->redirect("/Admin/Register/index");
		}
}