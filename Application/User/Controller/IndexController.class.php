<?php
namespace User\Controller;
use Think\Controller;
class IndexController extends Controller {
		
	function __construct(){
		parent::__construct();
		$this->setting = D("Admin/Setting");
		$this->set = $this->setting->getall();
	}

}