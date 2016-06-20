<?php
namespace Home\Controller;

use Home\Common\Authorize;
use Home\Common\BaseController;

class IndexController extends BaseController
{
    public function index()
    {
        $uid = session('uid');
        $rolerule = Authorize::getUserRoleRule($uid);
        $allows = array_map(function ($val) {
            return strtolower($val['rule_path']);
        }, $rolerule['rule']);
        $class['index'] = new \ReflectionClass(new IndexController());
        $class['public'] = new \ReflectionClass(new PublicController());
        $data = [];
        foreach ($class as $key => $value) {
            foreach ($value->getMethods() as $val) {
                if (0 === strpos($val->class, 'Home') && $val->name !== '_initialize') {
                    $path = $key . '/' . $val->name;
                    $data[] = [
                        'path' => $path,
                        'allow' => in_array(strtolower($path), $allows) || 0 === strpos($path, 'public'),
                    ];
                }
            }
        }
        $this->assign('data', $data);
        $this->display();
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
        dump(M('rule')->select());
        exit;
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
        dump(M('role')->select());
        exit;
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



