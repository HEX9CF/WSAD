<?php

namespace User\Controller;

use Think\Controller;

class SubmitController extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->setting = D("Admin/Setting");
        $this->set = $this->setting->getall();
    }

    //生成验证码
    function verify()
    {
        $Verify = new \Think\Verify();
        $Verify->fontSize = 25;
        $Verify->length = 4;
        $Verify->useNoise = true;
        //$Verify->codeSet = '';
        $Verify->imageW = 200;
        $Verify->imageH = 50;
        $Verify->expire = 600;
        $Verify->useCurve = true;
        $Verify->useImgBg = true;
        $Verify->entry();
    }

    public function index()
    {

        //判断SESSION中的AID是否存在
        $this->uid = session('uid');

        if ($this->uid < 1) {
            return $this->error("请登录后再访问本页面", "/User/Login/index");
        }
        //判断UID是否有效
        $this->user = D("user")->where(array('uid' => $this->uid))->find();
        if (!$this->user) {
            return $this->error("账号无效", "/User/Login/index");
        }

        $username = session('username');
        //读取系统设置信息
        $setting = D("setting");
        $set = $this->set;
        //读取数据库
        $submitmodel = D("submit");
        $count = $submitmodel->count();
        $page = new \Think\Page($count, $set['adminpagenum']);

        $where = array(
            'author' => $username,
        );
        $subs = $submitmodel->where($where)->order('subid desc')->limit($page->firstRow . ',' . $page->listRows)->select();

        $this->assign("show", $page->show());
        $this->assign("subs", $subs);
        $this->display();

    }

    public function submit()
    {

        //判断SESSION中的AID是否存在
        $this->uid = session('uid');

        if ($this->uid < 1) {
            return $this->error("请登录后再访问本页面", "/User/Login/index");
        }
        //判断UID是否有效
        $this->user = D("user")->where(array('uid' => $this->uid))->find();
        if (!$this->user) {
            return $this->error("账号无效", "/User/Login/index");
        }

        $valtitle = I("get.valtitle");
        $valcontent = I("get.valcontent");
        $valclass = I("get.valclass");
        $valimg = I("get.valimg");

        $classesmodel = D('classes');
        $classes = $classesmodel->select();

        $this->assign("classes", $classes);
        $this->assign('valtitle', $valtitle);
        $this->assign('valcontent', $valcontent);
        $this->assign('valclass', $valclass);
        $this->assign('valimg', $valimg);
        $this->display();
    }

    public function save()
    {

        //判断SESSION中的AID是否存在
        $this->uid = session('uid');

        if ($this->uid < 1) {
            return $this->error("请登录后再访问本页面", "/User/Login/index");
        }
        //判断UID是否有效
        $this->user = D("user")->where(array('uid' => $this->uid))->find();
        if (!$this->user) {
            return $this->error("账号无效", "/User/Login/index");
        }

        $subid = I("get.subid");
        $title = I("post.title");
        $content = I("post.content");
        $class = I("post.class");
        $img = I("post.img");
        /*
                //判断验证码
                function check_verify($code, $id = '')
                {
                    $verify = new \Think\Verify();
                    return $verify->check($code, $id);
                }

                $code = I('post.code');
                if (check_verify($code) == false) {
                    $this->error('验证码错误', "/User/Submit/submit?valtitle=" . $title . "&valcontent=" . $content . "&valclass=" . $class . "&valimg=" . $img);
                }
        */
        $submitmodel = D("submit");
        if (IS_POST) {
            $author = session('username');
            $rule = array(
                array("title", "require", "标题不能为空"),
                array("author", "require", "作者不能为空"),
                array("content", "require", "正文不能为空"),
            );
            if (!$submitmodel->validate($rule)->create()) {
                return $this->error($submitmodel->geterror(), "/User/Submit/submit");
            }

            //防止通过修改审查元素来修改分类
            $classresult = D("classes")->where(array('name' => $class))->find();
            if (!$classresult) {
                return $this->error("此分类不存在", "/Admin/Blog/add");
            }

            $insert = array(
                'title' => $title,
                'author' => $author,
                'content' => $content,
                'img' => $img,
                'class' => $class,
                'state' => 'wait',
            );
            $insert['intime'] = time();
            $insert['uptime'] = time();
            $submitmodel->add($insert);
            $this->success("操作成功", "/User/Submit/index");
        }
    }
}