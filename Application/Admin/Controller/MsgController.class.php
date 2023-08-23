<?php 
namespace Admin\Controller;
class MsgController extends AdminController {
    public function index(){
		
		//读取博客系统设置信息
		$setting = D("setting");
		$set = $setting->getall();
		//读取留言数据库
		$msgmodel = D("msg");
		$count = $msgmodel->count();
		$page = new \Think\Page($count,$set['adminpagenum']);

		$msgs = $msgmodel->order('mid desc')->limit($page->firstRow.','.$page->listRows)->select();

		$this->assign("show",$page->show());
		$this->assign("msgs",$msgs);
		$this->display();
    }

	public function delete(){
		$mid = I("get.mid");
		$msgmodel = D("msg");
		$msgresult = D("msg")->where( array('mid' => $mid ) )->delete();
		return $this->redirect("/Admin/Msg/index");
	}

	public function read(){
		$mid = I("get.mid");	
		$msgmodel = D("msg");
		$where = array(
			'mid' => $mid,	
		);
		$msgs = $msgmodel->where($where)->order('mid desc')->select();
		$msg = $msgs[0];
		$this->assign("msg",$msg);
		$this->display();
	}
}