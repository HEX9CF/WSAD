<?php

namespace Admin\Controller;
class AuserController extends AdminController
{
    public function index()
    {

        $admin = D("admin");

        $users = $admin->select();

        $data = array();
        $data['users'] = $users;

        $this->assign("data", $data);

        $this->display();

    }

    public function add()
    {

        $aid = I("get.aid");
        $admin = D("admin");
        $user = array(
            'aid' => 0,
            'auser' => '',
            'adminpw' => '',
        );
        if ($aid > 0) {
            $user = $admin->where(array('aid' => $aid))->find();
        }
        $this->assign("user", $user);
        $this->display();
    }

    public function delete()
    {
        $aid = I("get.aid");
        D("admin")->where(array('aid' => $aid))->delete();
        return $this->redirect("/Admin/Auser/");
    }

    public function _edit($aid)
    {
        $adminmodel = D("admin");

        if (IS_POST) {
            $auser = I("post.admin");
            $adminpw = I("post.adminpw");

            //判断用户名和密码是否为空
            $rule = array(
                array('auser', 'require', "用户名不能为空"),
                array('adminpw', 'require', "密码不能为空"),

            );

            if (!$adminmodel->validate($rule)->create()) {
                return $this->error($adminmodel->getError(), "/Admin/Auser/add");
            }

            //判断用户名是否重复
            $where = array();
            $where['admin'] = $auser;
            $where['aid'] = array('NEQ', $aid);
            $isArr = $adminmodel->where($where)->find();
            if ($isArr) {
                return $this->error("用户名已经存在", "/Admin/Auser/add");
            }

            //判断密码是否需要修改
            $pd = array(
                'aid' => $aid,
            );
            $finded = $adminmodel->where($pd)->find();
            $findpw = $finded['adminpw'];
            if ($findpw == $adminpw) {
                $insert = array(
                    'admin' => $auser,
                );
            } else {
                //md5加密
                $adminpw = md5($adminpw);

                $insert = array(
                    'admin' => $auser,
                    'adminpw' => $adminpw,
                );
            }

            //插入数据
            $is = $adminmodel->where(array('aid' => $aid))->save($insert);
            return $this->success("成功修改{$is}条数据", "/Admin/Auser/index");

        }

    }

    public function save()
    {
        $aid = I("get.aid");
        if ($aid > 0) {
            return $this->_edit($aid);
        }

        $admin = D("admin");

        if (IS_POST) {
            $auser = I("post.admin");
            $adminpw = I("post.adminpw");

            //判断用户名和密码是否为空
            $rule = array(
                array('auser', 'require', "用户名不能为空"),
                array('adminpw', 'require', "密码不能为空"),

            );

            if (!$admin->validate($rule)->create()) {
                return $this->error($admin->getError(), "/Admin/Auser/add");
            }

            //判断用户名是否重复
            $where = array();
            $where['admin'] = $auser;
            $isArr = $admin->where($where)->find();
            if ($isArr) {
                return $this->error("用户名已经存在", "/Admin/Auser/add");
            }

            //md5加密
            $adminpw = md5($adminpw);

            //插入数据
            $insert = array(
                'admin' => $auser,
                'adminpw' => $adminpw,

            );

            $aid = $admin->add($insert);
            if ($aid) {
                return $this->success('操作成功', "/Admin/Auser/index");
            } else {
                return $this->error('操作失败', "/Admin/Auser/add");
            }


        }
    }
}