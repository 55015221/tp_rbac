<?php
namespace Home\Controller;

use Home\Common\Authorize;
use Home\Common\BaseController;

class AuthController extends BaseController
{
    public function index()
    {

    }


    public function createRule()
    {
        if (IS_POST) {
            $data = [
                'rule_path' => trim(I('rule_path')),
                'rule_name' => trim(I('rule_name')),
            ];
            if (M('rule')->add($data)) {
                $this->redirect(U('Index/rulelist'));
            }
        }
        $this->display();
    }

    public function ruleList()
    {
        $data = M('rule')->select();

        $this->assign('data', $data);
        $this->display();
    }

    public function createRole()
    {
        if (IS_POST) {
            $data = [
                'role_name' => trim(I('role_name')),
            ];
            if (M('role')->add($data)) {
                $this->redirect(U('Index/rolelist'));
            }
        }
        $this->display();
    }

    public function roleList()
    {
        $data = M('role')->select();
        $this->assign('data', $data);
        $this->display();
    }

    public function roleRule()
    {
        if (IS_POST) {
            $data = [
                'role_id' => I('role_id'),
                'rule_id' => I('rule_id'),
            ];
            if (M('role_rule')->add($data)) {
                dump(M('role_rule')->select());
                exit;
            }
        }
        dump(M('role')->select());
        dump(M('rule')->select());
        $this->display();
    }

    public function userRole()
    {
        if (IS_POST) {
            $data = [
                'user_id' => I('user_id'),
                'role_id' => I('role_id'),
            ];
            if (M('user_role')->add($data)) {
                dump(M('user_role')->select());
                exit;
            }
        }
        dump(M('user')->select());
        dump(M('role')->select());
        $this->display();
    }

}



