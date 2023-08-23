<?php

namespace Mobile\Controller;

use Think\Controller;

class IndexController extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->setting = D("Admin/Setting");
        $this->set = $this->setting->getall();
    }

    public function index()
    {

        function get_device_type()
        {
            $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
            $type = 'other';
            if (strpos($agent, 'iphone') || strpos($agent, 'ipad')) {
                $type = 'ios';
            }
            if (strpos($agent, 'android')) {
                $type = 'android';
            }
            return $type;
        }

        if (get_device_type() !== 'ios' and get_device_type() !== 'android') {
            $this->redirect("Home/Index/index");
        }

        $nummodel = D("num");
        $pagemodel = D("page");
        $link_exchmodel = D("link_exch");
        $count = $pagemodel->count();
        $page = new \Think\Page($count, $this->set['indexpagenum']);

        //开始统计数据
        $getpages = $pagemodel->select();

        //统计文章总数
        $pagemodel = D("page");
        $pagecount = $pagemodel->count();
        $pageinsert = array(
            'val' => $pagecount
        );
        $nummodel->where(array('key' => 'page'))->save($pageinsert);

        //统计评论总数
        $msgmodel = D("msg");
        $msgcount = $msgmodel->count();
        $msginsert = array(
            'val' => $msgcount
        );
        $nummodel->where(array('key' => 'msg'))->save($msginsert);

        //统计用户总数
        $usermodel = D("user");
        $usercount = $usermodel->count();
        $userinsert = array(
            'val' => $usercount
        );
        $nummodel->where(array('key' => 'user'))->save($userinsert);

        //统计投稿总数
        $submitmodel = D("submit");
        $submitcount = $submitmodel->count();
        $submitinsert = array(
            'val' => $submitcount
        );
        $nummodel->where(array('key' => 'submit'))->save($submitinsert);

        //统计文章总点赞数
        foreach ($getpages as $getpage) {
            $zancount = $zancount + $getpage['zan'];
        }
        $zaninsert = array(
            'val' => $zancount,
        );
        $nummodel->where(array('key' => 'zan'))->save($zaninsert);

        //统计文章总阅读数
        $readnum = 0;
        foreach ($getpages as $getpage) {
            $readcount = $readcount + $getpage['read'];
        }
        $readinsert = array(
            'val' => $readcount,
        );
        $nummodel->where(array('key' => 'read'))->save($readinsert);

        //统计首页访客数
        $num = $nummodel->where(array('key' => 'vst'))->find();
        $data = $nummodel->select();
        $nums = array();
        foreach ($data as $row) {
            $nums[$row['cname']] = $row['val'];
        }
        $insert['val'] = $num['val'] + 1;
        $nummodel->where(array('key' => 'vst'))->save($insert);

        $blogs = $pagemodel->order('pid desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        $where['img'] = array(
            'NEQ', ''
        );
        $slidepagenum = $this->set['slidepagenum'];
        $slides = $pagemodel->order('pid desc')->where($where)->limit('0,' . $slidepagenum)->select();

        $link_exchs = $link_exchmodel->order('lid desc')->select();

        $this->assign('slides', $slides);
        $this->assign('blogs', $blogs);
        $this->assign('link_exchs', $link_exchs);

        $this->assign('vst', $insert['val']);
        $this->assign('nums', $nums);
        $this->assign('set', $this->set);
        $this->assign("show", $page->show());
        $this->display();
    }

    public function read()
    {
        $pid = I("get.pid");
        $valmsg = I("get.valmsg");

        function get_device_type()
        {
            $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
            $type = 'other';
            if (strpos($agent, 'iphone') || strpos($agent, 'ipad')) {
                $type = 'ios';
            }
            if (strpos($agent, 'android')) {
                $type = 'android';
            }
            return $type;
        }

        if (get_device_type() !== 'ios' and get_device_type() !== 'android') {
            $url = "Home/Index/read?pid=" . $pid;
            $this->redirect($url);
        }

        $msgmodel = D("msg");
        $pagemodel = D("page");

        //统计评论总数
        $msgcount = $msgmodel->where(array('pid' => $pid))->count();
        $msginsert = array(
            'msg' => $msgcount
        );
        $msgresult = $pagemodel->where(array('pid' => $pid))->save($msginsert);

        $blog = $pagemodel->where(array('pid' => $pid))->find();
        $msgs = $msgmodel->order('mid desc')->where(array('pid' => $pid))->select();
        $insert['read'] = $blog['read'] + 1;
        $pagemodel->where(array('pid' => $pid))->save($insert);
        $this->assign('blog', $blog);
        $this->assign('msgs', $msgs);
        $this->assign('valmsg', $valmsg);
        $this->assign('set', $this->set);
        $this->display();

    }

    public function zan()
    {
        $pid = I("get.pid");
        $pagemodel = D("page");
        $key = 'zan';
        $blog = $pagemodel->where(array('pid' => $pid))->find();
        $session_page = session('zan');
        $rule = "zan" . $pid;
        if ($session_page == $rule) {
            return $this->error("您已经赞过这篇文章了", $url);
        }
        $insert['zan'] = $blog['zan'] + 1;
        $pagemodel->where(array('pid' => $pid))->save($insert);
        $url = "/Mobile/Index/read?pid=" . $blog['pid'];
        $session_page = "zan" . $pid;
        session('zan', $session_page);
        $this->redirect($url);

    }

    public function msg()
    {
        $pid = I("get.pid");
        $msg = strip_tags(I("post.msg"));
/*
        //判断验证码
        function check_verify($code, $id = '')
        {
            $verify = new \Think\Verify();
            return $verify->check($code, $id);
        }

        $code = I('post.code');
        if (check_verify($code) == false) {
            $this->error('验证码错误', "/Mobile/Index/read?pid=" . $pid . "&valmsg=" . $msg);
        }
*/
        $msgmodel = D("msg");
        $nummodel = D("num");
        $pagemodel = D("page");
        $user = session('username');
        if ($pid == false) {
            $url = "/Mobile/Index/index";
            return $this->error("文章编号不能为空", $url);
        }
        if ($msg == false) {
            $url = "/Mobile/Index/read?pid=" . $pid;
            return $this->error("评论内容不能为空", $url);
        }
        if ($user == false) {
            $url = "/Mobile/Login/index";
            return $this->error("游客无法发布评论，请登录后重试", $url);
        }
        $insert = array(
            'pid' => $pid,
            'user' => $user,
            'msg' => $msg,
        );
        $insert['time'] = time();
        $msgmodel->add($insert);
        $blog = $pagemodel->where(array('pid' => $pid))->find();
        $msgs = $pagemodel->where(array('pid' => $pid))->find();
        $url = "/Mobile/Index/read?pid=" . $blog['pid'];
        return $this->success("评论发布成功", $url);
    }

    public function msgzan()
    {
        $pid = I("get.pid");
        $mid = I("get.mid");
        $msgmodel = D("msg");
        $key = 'msgzan';
        $msg = $msgmodel->where(array('mid' => $mid))->find();
        $session_page = session('msgzan');
        $rule = "msgzan" . $mid;
        if ($session_page == $rule) {
            return $this->error("您已经赞过这条评论了", $url);
        }
        $insert['msgzan'] = $msg['msgzan'] + 1;
        $msgmodel->where(array('mid' => $mid))->save($insert);
        $url = "/Mobile/Index/read?pid=" . $pid;
        $session_page = "msgzan" . $mid;
        session('msgzan', $session_page);
        $this->redirect($url);
    }

}
