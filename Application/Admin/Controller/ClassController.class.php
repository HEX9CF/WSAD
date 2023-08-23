<?php 
namespace Admin\Controller;
class ClassController extends AdminController {
    public function index(){
		
		//读取博客系统设置信息
		$setting = D("setting");
		$set = $setting->getall();
		//读取博客数据库
		$classesmodel = D("classes");
		$count = $classesmodel->count();
		$page = new \Think\Page($count,$set['adminpagenum']);

		$classes = $classesmodel->order('cid desc')->limit($page->firstRow.','.$page->listRows)->select();

		$this->assign("show",$page->show());
		$this->assign("classes",$classes);
		$this->display();
    }

	public function add(){
		$cid = I("get.cid");
		$classesmodel = D("classes");
		$class = array(
			'cid'     => 0,
			'name'   => '',
			'icon'   => 'tags',
		);

		if( $cid > 0 ){
		$class = $classesmodel->where( array('cid'=>$cid) )->find();
		
		}

		$this->assign("class",$class);
		$this->display();
	}

	public function delete(){
		$cid = I("get.cid");		
		$classresult = D("classes")->where( array('cid' => $cid ) )->find();
		D("classes")->where( array('cid' => $cid ) )->delete();
		return $this->redirect("/Admin/Class/index");
	}

	public function save(){
		$cid = I("get.cid");
		$classesmodel = D("classes");
		if( IS_POST){
			$name = I("post.name");
			$icon = I("post.icon");

			if(!$name){
				return $this->error( "分类名称不能为空","/Admin/Class/add" );
			}
			if(!$icon){
				$icon = "tags";
			}

			$insert = array(
				'name' => $name,
				'icon' => $icon,
			);

			if( $cid > 0 ){
				$classesmodel->where( array('cid'=>$cid) )->save( $insert );
			}else{
				$classesmodel->add( $insert );
			}
			return $this->success( "操作成功" ,"/Admin/Class/index");

		}
	}
}