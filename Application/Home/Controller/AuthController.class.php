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
                $this->redirect(U('Auth/rulelist'));
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
                $this->redirect(U('Auth/rolelist'));
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
        $role_id = I('role_id');

        $rules = M('rule')->select();
        $roleRule = M('role_rule')->where(['role_id' => $role_id])->select();
        $roleRule = array_map(function ($val) {
            return $val['rule_id'];
        }, $roleRule);

        foreach ($rules as &$value) {
            $value['active'] = false;
            if (in_array($value['rule_id'], $roleRule)) {
                $value['active'] = true;
            }
        }

        if (IS_POST) {
            $ids = I('ids');

            $assoc_add = array_diff($ids, $roleRule);
            $assoc_del = array_diff($roleRule, $ids);

            foreach ($assoc_add as $rule_id) {
                $addData = [
                    'role_id' => $role_id,
                    'rule_id' => $rule_id,
                ];
                M('role_rule')->add($addData);
            }

            foreach ($assoc_del as $rule_id) {
                $delData = [
                    'role_id' => $role_id,
                    'rule_id' => $rule_id,
                ];
                M('role_rule')->where($delData)->delete();
            }

            $this->success('ok');
        }

        $this->assign('role_id', $role_id);
        $this->assign('rules', $rules);
        $this->display();
    }

    public function userRole()
    {
        $user_id = I('user_id');

        if (IS_POST) {
            $role_id = I('role_id');
            M('user_role')->where(['user_id' => $user_id])->setField('role_id', $role_id);
            $this->success('ok');
        }
        $roleId = M('user_role')->where(['user_id' => $user_id])->getField('role_id');
        $roles = M('role')->select();

        foreach ($roles as &$value) {
            $value['active'] = false;
            if ($value['role_id'] == $roleId) {
                $value['active'] = true;
            }
        }

        $this->assign('user_id', $user_id);
        $this->assign('roles', $roles);
        $this->display();
    }

}



