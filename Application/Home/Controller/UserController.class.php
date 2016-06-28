<?php
namespace Home\Controller;

use Home\Common\Authorize;
use Home\Common\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $sql = "SELECT * FROM mt_user AS USER
                LEFT JOIN mt_user_role AS user_role ON USER .user_id = user_role.user_id
                LEFT JOIN mt_role AS role ON role.role_id = user_role.role_id";
        $data = M()->query($sql);

        $this->assign('data', $data);
        $this->display();
    }


}



