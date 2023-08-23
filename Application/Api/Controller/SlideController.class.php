<?php
namespace Api\Controller;
use Think\Controller;
class SlideController extends Controller {

	function __construct(){
		parent::__construct();
		$this->setting = D("Admin/Setting");
		$this->set = $this->setting->getall();
	}

    public function index(){
		$w = I('get.width');
		$h = I('get.height');
		$l = I('get.limit');
		if($w == ""){
		$w = "400px";
		}
		if($h == ""){
		$h = "300px";
		}
		if($l == ""){
		$l = "5";
		}
		$pagemodel = D("page");
		$slides = $pagemodel->order('pid desc')->where( $where )->limit('0,'.$l)->select();
		$this->assign('w',$w);
		$this->assign('h',$h);
		$this->assign('slides',$slides);
		$this->display();
    }

}
