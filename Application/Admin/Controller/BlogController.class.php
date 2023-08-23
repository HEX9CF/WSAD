<?php 
namespace Admin\Controller;
class BlogController extends AdminController {
    public function index(){
		
		//读取博客系统设置信息
		$setting = D("setting");
		$set = $setting->getall();
		//读取博客数据库
		$pagemodel = D("page");
		$count = $pagemodel->count();
		$page = new \Think\Page($count,$set['adminpagenum']);

		$blogs = $pagemodel->order('pid desc')->limit($page->firstRow.','.$page->listRows)->select();

		$this->assign("show",$page->show());
		$this->assign("blogs",$blogs);
		$this->display();
    }

	public function add(){
		$pid = I("get.pid");
		$pagemodel = D("page");
		$classesmodel = D("classes");
		
		$blog = array(
			'pid'     => 0,
			'title'   => '',
			'author' => '',
			'img' => false,
			'content' => '',
			'class' => '',
		);

		if( $pid > 0 ){
		$blog = $pagemodel->where( array('pid'=>$pid) )->find();

		}

		if( !$blog['class'] ){
		$classes = $classesmodel->select();
		}else{
		$classes = $classesmodel->select();
		}

		$this->assign("blog",$blog);
		$this->assign("classes",$classes);
		$this->display();
	}

	public function delete(){
		$pid = I("get.pid");		
		$msgmodel = D("msg");
		$msgresult = D("msg")->where( array('pid' => $pid ) )->delete();
		$pageresult = D("page")->where( array('pid' => $pid ) )->find();
		D("page")->where( array('pid' => $pid ) )->delete();
		return $this->redirect("/Admin/Blog");
	}

	public function top(){
		$pid = I("get.pid");		
		$insert['top'] = 'true';
		$insert['uptime'] = time();
		$pagemodel = D("page");
		$pagemodel->where( array( 'pid' => $pid, ) )->save( $insert );
		return $this->redirect("/Admin/Blog");
	}

	public function untop(){
		$pid = I("get.pid");		
		$insert['top'] = 'false';
		$insert['uptime'] = time();
		$pagemodel = D("page");
		$pagemodel->where( array( 'pid' => $pid,) )->save( $insert );
		return $this->redirect("/Admin/Blog");
	}

	public function save(){
		$pid = I("get.pid");
		$pagemodel = D("page");
		if( IS_POST){
			$title = I("post.title");
			$author = I("post.author");
			$content = I("post.content");
			$class = I("post.class");
			$img = I("post.img");
			$rule = array(
				array("title","require","标题不能为空"),
				array("author","require","作者不能为空"),
				array("content","require","正文不能为空"),
			);
			if( !$pagemodel->validate($rule)->create() ){
				return $this->error( $pagemodel->geterror(),"/Admin/Blog/add" );
			}

			//防止通过修改审查元素来修改分类
			$classresult = D("classes")->where( array('name' => $class ) )->find();
			if(!$classresult){
				return $this->error( "此分类不存在","/Admin/Blog/add" );
			}

			$insert = array(
				'title' => $title,
				'author' => $author,
				'content' => $content,
				'class' => $class,
				'img' => $img,
			);
			
			if( $pid > 0 ){
				$insert['uptime'] = time();
				$pagemodel->where( array('pid'=>$pid) )->save( $insert );
			}else{
				$insert['intime'] = time();
				$insert['uptime'] = time();
				$pagemodel->add( $insert );
			}
			return $this->success( "操作成功" ,"/Admin/Blog/index");

		}
	}

	public function upload(){

		$result = array();
		$result['msg'] = '';
		$result['success'] = false;
		$result['file_path'] = '';

		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		 // 上传文件 
		$info   =   $upload->uploadOne( $_FILES['upload_file'] );
		$url = '/Uploads/' . $info['savepath'] . $info['savename'];

		//if(!$info){
			//$result['msg'] = $upload->geterror();
		//}else{
			$result['file_path'] = $url;
			$result['success'] = true;
		//}

		$imageurl = './Uploads/' . $info['savepath'] . $info['savename'];
		$image = new \Think\Image(); 
		$image->open($imageurl)->thumb(400, 300,\Think\Image::IMAGE_THUMB_FILLED)->save($imageurl);
		$image->open($imageurl)->water('./water.png',\Think\Image::IMAGE_WATER_SOUTHEAST,100)->save($imageurl); 

		$this->ajaxReturn($result);
	}
}