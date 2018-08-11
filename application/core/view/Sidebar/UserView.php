<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 19:36
 */

namespace application\core\view\Sidebar;


use application\core\View;
use application\models\User;

/**
 * Class SidebarUserView
 * @package application\core\view\Sidebar
 * @property User user
 */
class UserView extends View
{
    protected $template = 'sidebar/user.php';

    protected function init()
    {
        $this->aParams['user'] = \application\core\model\User::getUser()->getModel();
    }

    /**
     * @param User $oUser
     */
    public function setUser($oUser)
    {
        $this->aParams['user'] = $oUser;
    }
}