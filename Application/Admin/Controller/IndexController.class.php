<?php 
namespace Admin\Controller;
class IndexController extends AdminController {
    public function index(){
		//读取统计数据
		$nummodel = D("num");
		$nummodel->where( array('key'=>'submit') )->save($submitinsert);
		$num = $nummodel->where( array('key'=>'vst') )->find();
		$data = $nummodel->select();
		$nums = array();
		foreach( $data as $row ){
			$nums[ $row['cname'] ] = $row['val'];
		}

		//读取系统设置
		$setting = D("setting");

		$this->assign( 'setting',$setting->getall() );
		$this->assign('nums',$nums);
		$this->display();
    }
}