<?php 
namespace Admin\Controller;
class SubmitController extends AdminController {

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
		$submitmodel = D("submit");
		$count = $submitmodel->count();
		$page = new \Think\Page($count,$set['adminpagenum']);

		$where = array(
			'author'=>$username,
		);
		$subs = $submitmodel->order('subid desc')->limit($page->firstRow.','.$page->listRows)->select();

		$this->assign("show",$page->show());
		$this->assign("subs",$subs);
		$this->display();

    }

	public function pass(){
		
		$subid = I("get.subid");
		$submitmodel = D("submit");
		if(!$subid){
			return $this->error( "操作失败" ,"/Admin/Submit/index");
		}

		$insert = array(
			'state' => 'true',
		);
		
		$insert['uptime'] = time();
		$submitmodel->where( array('subid'=>$subid) )->save( $insert );

		$where = array(
			'subid'=>$subid,
		);
		$sub2 = $submitmodel->where($where)->select();
		$sub = $sub2[0];

		$pagemodel = D("page");
		
		$title = $sub['title'];
		$author = $sub['author'];
		$content = $sub['content'];
		$class = $sub['class'];
		$img = $sub['img'];
		$intime = $sub['intime'];

		$pageinsert = array(
			'title' => $title,
			'author' => $author,
			'content' => $content,
			'class' => $class,
			'img' => $img,
			'intime' => $intime,
		);
		
		
		$pageinsert['uptime'] = time();
		$pid =  $pagemodel->add( $pageinsert );

		$insert2 = array(
			'pid' => $pid,
		);
		$submitmodel->where( array('subid'=>$subid) )->save( $insert2 );

		return $this->redirect("/Admin/Submit/index");
	}

		public function false(){
			$subid = I("get.subid");
			$submitmodel = D("submit");
			if(!$subid){
			return $this->error( "操作失败" ,"/Admin/Submit/index");
			}

			$where = array(
			'subid'=>$subid,
			);
			$sub2 = $submitmodel->where($where)->select();
			$sub = $sub2[0];
			$pid = $sub['pid'];			
	
			$msgmodel = D("msg");
			$msgresult = D("msg")->where( array('pid' => $pid ) )->delete();
			$pageresult = D("page")->where( array('pid' => $pid ) )->find();
			D("page")->where( array('pid' => $pid ) )->delete();

			$insert = array(
			'state' => 'false',
			'pid' => '',
			);
			
			$submitmodel->where( array('subid'=>$subid) )->save( $insert );

			return $this->redirect("/Admin/Submit/index");
		}

		public function read(){
		$subid = I("get.subid");
		if(!$subid){
			return $this->error( "操作无效" ,"/Admin/Submit/index");
		}
		$submitmodel = D("submit");
		$where =  array(
			'subid'=>$subid
		);
		$blog = $submitmodel->where( $where )->find();
		$this->assign('blog',$blog);
		$this->assign('set',$this->set);
        $this->display();

	}
}