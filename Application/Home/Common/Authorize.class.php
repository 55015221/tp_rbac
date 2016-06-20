<?php

namespace Home\Common;


class Authorize
{
    const ACCESS_LIST = '_ACCESS_LIST_';


    public static function getUserInfo()
    {
        $uid = session('uid');
        return M('user')->find($uid);
    }

    //认证
    public static function identify($map)
    {
        $data = M('user')->where($map)->find();
        if (!empty($data)) {
            return $data['user_id'];
        }
        return false;
    }

    public static function check($path)
    {
        if (in_array(strtolower($path), self::accessList())) {
            return true;
        }
        return false;
    }

    public static function accessList()
    {
        $uid = session('uid');
        $sql = "SELECT DISTINCT role.role_id,role.role_name,rule.rule_name,rule.rule_path
            FROM mt_user_role AS user_role
            LEFT JOIN mt_role_rule AS role_rule ON role_rule.role_id = user_role.role_id
            LEFT JOIN mt_role AS role ON role.role_id = role_rule.role_id
            LEFT JOIN mt_rule AS rule ON rule.rule_id = role_rule.rule_id
            WHERE user_role.user_id = {$uid}";
        $data = M()->query($sql);
        $accessList = [];
        if (!empty($data)) {
            $accessList = array_map(function ($val) {
                return strtolower($val['rule_path']);
            }, $data);
        }
        return $accessList;
    }

    public static function getRoles($uid)
    {
        $sql = "SELECT DISTINCT role.role_id,role.role_name
            FROM mt_user_role AS user_role
            LEFT JOIN mt_role_rule AS role_rule ON role_rule.role_id = user_role.role_id
            LEFT JOIN mt_role AS role ON role.role_id = role_rule.role_id
            WHERE user_role.user_id = {$uid}";
        $data = M()->query($sql);
        return $data;
    }

    public static function getRules($roles)
    {
        $ids = implode(',', $roles);
        $sql = "SELECT DISTINCT rule.rule_id, rule.rule_name, rule.rule_path
            FROM mt_role_rule AS role_rule
            LEFT JOIN mt_rule AS rule ON rule.rule_id = role_rule.rule_id
            WHERE role_rule.role_id IN ({$ids})";
        $data = M()->query($sql);
        return $data;
    }

    public static function getUserRoleRule($uid)
    {
        $role = Authorize::getRoles($uid);
        $roleIds = array_map(function ($val) {
            return $val['role_id'];
        }, $role);
        $rule = Authorize::getRules($roleIds);
        $data = [
            'role' => $role,
            'rule' => $rule,
        ];
        return $data;
    }


}