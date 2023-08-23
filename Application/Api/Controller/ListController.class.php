<?php
namespace Api\Controller;
use Think\Controller;
class ListController extends Controller {

	function __construct(){
		parent::__construct();
		$this->setting = D("Admin/Setting");
		$this->set = $this->setting->getall();
	}

    public function index(){
		$l = I("limit,get");
		if($l == ""){
		$l = "10";
		}
		$pagemodel = D("page");
		$count = $pagemodel->count();
		$page = new \Think\Page($count,$l);

		$blogs = $pagemodel->order('pid desc')->limit($page->firstRow.','.$page->listRows)->select();
		//输出
		$this->assign('blogs',$blogs);
		$this->assign("show",$page->show());
        $this->display();
    }
}