<?php
namespace Home\Controller;

use Home\Common\Authorize;
use Home\Common\BaseController;

class PublicController extends BaseController
{
    public function login()
    {
        if (IS_AJAX) {
            $map = [
                'username' => I('username'),
                'password' => I('password'),
            ];
            if ($data = Authorize::identify($map)) {
                Authorize::login($data);
                $this->success('登录成功！', U('Index/index'));
            }
            $this->error('用户名或密码错误！');
        }

        $this->display();
    }

    public function logout()
    {
        Authorize::logout();
        $this->redirect(U('Public/login'));
    }
}