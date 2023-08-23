<?php

namespace Mobile\Controller;

use Think\Controller;

class RegisterController extends Controller
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
            $this->redirect("User/Register/index");
        }

        $act = I("get.act");
        $valuser = I("get.valuser");
        $valemail = I("get.valemail");
        $valpw = I("get.valpw");
        $valpw2 = I("get.valpw2");

        if ($act == 'chk') {
            $username = mb_substr(strip_tags(html_entity_decode(I("post.username"))), 0, 16);
            $email = I("post.email");
            $userpw = I("post.userpw");
            $userpw2 = I("post.userpw2");
/*
            //判断验证码
            function check_verify($code, $id = '')
            {
                $verify = new \Think\Verify();
                return $verify->check($code, $id);
            }

            $code = I('post.code');
            if (check_verify($code) == false) {
                $this->error('验证码错误', "/Mobile/Register/index?valuser=" . $username . "&valemail=" . $email . "&valpw=" . $userpw . "&valpw2=" . $userpw2);
            }
*/
            if (session('reg')) {
                return $this->error("请勿重复提交申请", "/Mobile/Register/index?valuser=" . $username . "&valemail=" . $email . "&valpw=" . $userpw . "&valpw2=" . $userpw2);
            }

            $regmodel = D('reg');
            $usermodel = D('user');

            if (!$username) {
                return $this->error("用户名不能为空,请重新输入", "/Mobile/Register/index?valuser=" . $username . "&valemail=" . $email . "&valpw=" . $userpw . "&valpw2=" . $userpw2);
            }

            if (!$email) {
                return $this->error("电子邮箱不能为空,请重新输入", "/Mobile/Register/index?valuser=" . $username . "&valemail=" . $email . "&valpw=" . $userpw . "&valpw2=" . $userpw2);
            }

            if (!$userpw) {
                return $this->error("密码不能为空,请重新输入", "/Mobile/Register/index?valuser=" . $username . "&valemail=" . $email . "&valpw=" . $userpw . "&valpw2=" . $userpw2);
            }

            if ($userpw !== $userpw2) {
                return $this->error("新密码与确认密码(再输入一遍密码)不匹配,请重新输入", "/Mobile/Register/index?valuser=" . $username . "&valemail=" . $email . "&valpw=" . $userpw . "&valpw2=" . $userpw2);
            }

            //判断用户名是否重复
            $where = array();
            $where['username'] = $username;
            $isArr = $usermodel->where($where)->find();
            if ($isArr) {
                return $this->error("用户名已经存在", "/Mobile/Register/index?valuser=" . $username . "&valemail=" . $email . "&valpw=" . $userpw . "&valpw2=" . $userpw2);
            }

            //md5加密
            $userpw = md5($userpw);
            $userpw2 = md5($userpw2);

            $insert = array(
                'username' => $username,
                'email' => $email,
                'userpw' => $userpw,
                'time' => time(),
            );
            $rid = $regmodel->add($insert);
            session('reg', 'true');
            return $this->success("成功提交申请,请耐心等待管理员审核，审核成功后即可进行登录操作", "/Mobile/Index/index");
        }
        $this->assign("valuser", $valuser);
        $this->assign("valemail", $valemail);
        $this->assign("valpw", $valpw);
        $this->assign("valpw2", $valpw2);
        $this->display();

    }
}