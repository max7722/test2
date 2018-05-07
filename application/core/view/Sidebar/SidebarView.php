<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 19:32
 */

namespace application\core\view\Sidebar;


use application\core\View;

/**
 * Class SidebarView
 * @package application\core\view\Sidebar
 * @property HeadLogo head
 * @property UserView user
 * @property MenuView menu
 */
class SidebarView extends View
{
    protected $template = 'sidebar/main.php';

    protected function init()
    {
        $this->aParams['head'] = new HeadLogo();
        $this->aParams['user'] = new UserView();
        $this->aParams['menu'] = new MenuView();
    }
}