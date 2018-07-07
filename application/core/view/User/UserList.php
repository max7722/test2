<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 12.06.2018
 * Time: 17:50
 */

namespace application\core\view\User;


use application\core\model\User;
use application\core\View;

/**
 * Class UserList
 * @package application\core\view\User
 * @property User[] userList
 */
class UserList extends View
{
    protected $template = 'user/userList.php';

    protected function init()
    {
        $this->aParams['userList'] = [];
    }

    protected function setUserList($value)
    {
        $this->aParams['userList'] = $value;
    }
}