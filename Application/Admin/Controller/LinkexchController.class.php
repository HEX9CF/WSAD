<?php 
namespace Admin\Controller;
class LinkexchController extends AdminController {
    public function index(){
		
		//读取博客系统设置信息
		$setting = D("setting");
		$set = $setting->getall();
		//读取博客数据库
		$Link_exchmodel = D("Link_exch");
		$count = $Link_exchmodel->count();
		$page = new \Think\Page($count,$set['adminpagenum']);

		$Link_exchs = $Link_exchmodel->order('lid desc')->limit($page->firstRow.','.$page->listRows)->select();

		$this->assign("show",$page->show());
		$this->assign("Link_exchs",$Link_exchs);
		$this->display();
    }

	public function add(){
		$lid = I("get.lid");
		$Link_exchmodel = D("Link_exch");
		$link = array(
			'lid'     => 0,
			'name'   => '',
			'url' => '',
			'img' => '',
		);

		if( $lid > 0 ){
		$link = $Link_exchmodel->where( array('lid'=>$lid) )->find();
		
		}

		$this->assign("link",$link);
		$this->display();
	}

	public function delete(){
		$lid = I("get.lid");		
		$Link_exchresult = D("Link_exch")->where( array('lid' => $lid ) )->find();
		D("Link_exch")->where( array('lid' => $lid ) )->delete();
		return $this->redirect("/Admin/Linkexch/index");
	}

	public function save(){
		$lid = I("get.lid");
		$Link_exchmodel = D("Link_exch");
		if( IS_POST){
			$name = I("post.name");
			$url = I("post.url");
			$img = I("post.img");

			if(!$name){
				return $this->error( "网站名称不能为空","/Admin/Linkexch/add" );
			}
			if(!$url){
				return $this->error( "URL不能为空","/Admin/Linkexch/add" );
			}

			$insert = array(
				'name' => $name,
				'url' => $url,
				'img' => $img,
			);
			
			if( $lid > 0 ){
				$Link_exchmodel->where( array('lid'=>$lid) )->save( $insert );
			}else{
				$Link_exchmodel->add( $insert );
			}
			return $this->success( "操作成功" ,"/Admin/Linkexch/index");

		}
	}
}