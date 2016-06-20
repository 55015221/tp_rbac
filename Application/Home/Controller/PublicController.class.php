<?php
namespace Home\Controller;

use Home\Common\Authorize;
use Home\Common\BaseController;

class PublicController extends BaseController
{
    public function login()
    {
        $map = [
            'username' => I('username'),
            'password' => I('password'),
        ];
        if ($uid = Authorize::identify($map)) {
            session('uid', $uid);
            $this->redirect(U('Index/index'));
        }
        $this->display();
    }

    public function logout()
    {
        if (null == session('uid', null)) {
            $this->redirect(U('Public/login'));
        }
    }
}