<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 19:37
 */

namespace application\core\view\Sidebar;


use application\core\ViewContent;

/**
 * Class SidebarMenuView
 * @package application\core\view\Sidebar
 * @property SidebarView[] items
 */
class MenuView extends ViewContent
{
    protected $template = 'sidebar/menu.php';

    protected function init()
    {
    }
}