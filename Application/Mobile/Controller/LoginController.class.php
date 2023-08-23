<?php

namespace Mobile\Controller;

use Think\Controller;

class LoginController extends Controller
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
        //$Verify->imageW = 100;
        //$Verify->imageH = 30;
        $Verify->expire = 600;
        $Verify->useCurve = true;
        $Verify->useImgBg = true;
        $Verify->entry();
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
            $this->redirect("User/Login/index");
        }

        $act = I("get.act");
        $valuser = I("get.valuser");
        $valpw = I("get.valpw");
        if ($act == 'chk') {
            $username = I("post.username");
            $userpw = I("post.userpw");
/*
            //判断验证码
            function check_verify($code, $id = '')
            {
                $verify = new \Think\Verify();
                return $verify->check($code, $id);
            }

            $code = I('post.code');
            if (check_verify($code) == false) {
                $this->error('验证码错误', "/Mobile/Login/index?valuser=" . $username . "&valpw=" . $userpw);
            }
*/
            $usermodel = D('user');

            //md5加密
            $userpw = md5($userpw);

            $where = array(
                'username' => $username,
                'userpw' => $userpw,
            );
            $result = $usermodel->where($where)->find();
            if (!$result) {
                return $this->error("账号不存在或密码错误", "/Mobile/Login/index");
            } else {
                session("uid", $result['uid']);
                session("username", $result['username']);
                return $this->success("登录成功", "/Mobile/Index/index");
            }

        }
        $this->assign("valpw", $valpw);
        $this->assign("valuser", $valuser);
        $this->display();
    }

    function logout()
    {
        session('uid', null);
        session("username", null);
        return $this->error("退出成功", "/Mobile/Index/index");
    }
}