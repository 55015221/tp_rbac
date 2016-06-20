<?php
namespace Home\Common;

use Home\Common\Authorize;
use Think\Controller;

class BaseController extends Controller
{
    public $action_allow = [
       'public/login', 'public/logout'
    ];

    public function _initialize()
    {
        $uri = strtolower(CONTROLLER_NAME . '/' . ACTION_NAME);
        if (in_array($uri, $this->action_allow)) {
            return true;
        }
        if (!($uid = session('uid'))) {
            $this->redirect(U('Public/login'));
        }
        if (!Authorize::check($uri)) {
            $this->error('你没有权限访问！');
        }
    }
}



