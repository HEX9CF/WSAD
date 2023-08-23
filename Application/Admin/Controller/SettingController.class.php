<?php 
namespace Admin\Controller;
class SettingController extends AdminController {
    public function index(){
		$setting = D("setting");
		$this->assign( 'setting',$setting->cname_getall() );
		$this->display();
    }
	public function save(){
		$post = I("post.");
		$setting = D("Setting");
		foreach( $post as $cname=>$val ){
			$setting->where( array( 'cname'=>$cname ) )->save( array( 'val'=>$val ) );
		}
		$this->success("操作成功","/Admin/Setting/index");
	}
}
