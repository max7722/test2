<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 19:37
 */

namespace application\core\view\Sidebar;


use application\core\View;

/**
 * Class SidebarMenuView
 * @package application\core\view\Sidebar
 * @property SidebarView[] items
 */
class MenuView extends View
{
    protected $template = 'sidebar/menu.php';

    protected function init()
    {
        $this->aParams['items'] = [];
    }

    public function addItems($oItem)
    {
        $this->aParams['items'][] = $oItem;
    }
}