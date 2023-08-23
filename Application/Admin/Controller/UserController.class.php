<?php 
namespace Admin\Controller;
class UserController extends AdminController {
    public function index(){
		
		$user = D("user");

		$users = $user->order("uid desc")->select();

		$data = array();
		$data['users'] = $users;

		$this->assign( "data",$data );

		$this->display();

    }

	public function add(){

		$uid = I("get.uid");
		$usermodel = D("user");
		$user = array(
			'uid'     => 0,
			'username'   => '',
			'userpw' => '',
			'email' => '',
		);
		if( $uid > 0 ){
		$user = $usermodel->where( array('uid'=>$uid) )->find();
		}
		$this->assign( "user",$user );
		$this->display();

	}

	public function delete(){
		$uid = I("get.uid");
		D("user")->where( array('uid'=>$uid) )->delete();
		return $this->redirect("/Admin/User/index");
	}

	public function ban(){
		$uid = I("get.uid");
		D("user")->where( array('uid'=>$uid) )->save(array('ban' => true));
		return $this->redirect("/Admin/User/index");
	}

	public function unban(){
		$uid = I("get.uid");
		D("user")->where( array('uid'=>$uid) )->save(array('ban' => ''));
		return $this->redirect("/Admin/User/index");
	}

	public function _edit( $uid ){
		$usermodel = D("user");
		
		if( IS_POST ){
		$username = I("post.username");
		$userpw = I("post.userpw");
		$email = I("post.email");
		
		//判断用户名和密码是否为空

		$rule = array(
				array('username','require',"用户名不能为空"),	
				array('userpw','require',"密码不能为空"),
		
		);

		if( !$usermodel->validate( $rule )->create() ){
			return $this->error( $usermodel->getError(),"/Admin/User/add" );
		}
		
		//判断用户名是否重复
		$where = array();
		$where['username'] = $username;
		$where['uid'] = array('NEQ',$uid);
		$isArr = $usermodel->where( $where )->find();
		if( $isArr ){
			return $this->error( "用户名已经存在","/Admin/User/add" );
		}

		//判断密码是否需要修改
		$pd = array(
			'uid' => $uid,
		);
		$finded = $usermodel->where( $pd )->find();
		$findpw = $finded['userpw'];
		if($findpw == $userpw){
			$insert = array(
			'username' => $username,
			'email' => $email,
			);
		}else{
			//md5加密
			$settingmodel = D('setting');
			$settingwhere = array(
				'key' => 'md5key',
			);
			$setting = $settingmodel->where( $settingwhere )->find();
			$x = 0;
			$key = $setting['val'];
			while( $x <= $key ) {
			  $userpw = md5($userpw);
			  $x++;
			}
			//加密完成
			$insert = array(
			'username' => $username,
			'userpw' => $userpw,
			'email' => $email,
			);
		}

		//插入数据
		$is = $usermodel->where( array('uid'=>$uid) )->save( $insert );
		return $this->success( "成功修改{$is}条数据","/Admin/User/index" );


	}

	}

	public function save(){
		$uid = I("get.uid");
		if( $uid>0 ){
			return $this->_edit( $uid );
		}

		$usermodel = D("user");

		if( IS_POST ){
			$username = I("post.username");
			$userpw = I("post.userpw");
			
			//判断用户名和密码是否为空
			$rule = array(
					array('username','require',"用户名不能为空"),	
					array('userpw','require',"密码不能为空"),
			
			);

			if( !$usermodel->validate( $rule )->create() ){
				return $this->error( $usermodel->getError(),"/Admin/User/add" );
			}
			
			//判断用户名是否重复
			$where = array();
			$where['username'] = $username;
			$isArr = $usermodel->where( $where )->find();
			if( $isArr ){
				return $this->error( "用户名已经存在","/Admin/User/add" );
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
			  $userpw = md5($userpw);
			  $x++;
			}
			//加密完成

			//插入数据
			$insert = array(
				'username' => $username,
				'userpw' => $userpw,
			
			);



			$uid = $usermodel->add( $insert );
			if( $uid ){
				return $this->success( '操作成功',"/Admin/User/index" );
			}else{
				return $this->error( '操作失败',"/Admin/User/add" );
			}


		}
	}
}