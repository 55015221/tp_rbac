<?php
namespace Home\Common;

use Home\Common\Authorize;
use Think\Controller;

class BaseController extends Controller
{
    public $action_allow = [
        'public/login', 'public/logout', 'index/index'
    ];

    public function _initialize()
    {
        $uri = strtolower(CONTROLLER_NAME . '/' . ACTION_NAME);
        if (!in_array($uri, $this->action_allow)) {
            if (!(Authorize::getUserInfo())) {
                $this->redirect(U('Public/login'));
            }
            if (!Authorize::check($uri)) {
                $this->error('你没有权限访问！');
            }
        }

        $this->assign('__USER__', Authorize::getUserInfo());
        $this->assign('nav', Authorize::getSidebar());
        $this->assign('subnav', Authorize::getSubnav());
    }
}



