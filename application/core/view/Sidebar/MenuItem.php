<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 19:40
 */

namespace application\core\view\Sidebar;


use application\core\View;

/**
 * Class SidebarMenuItem
 * @package application\core\view\Sidebar
 * @property string title
 * @property string path
 */
class MenuItem extends View
{
    protected $template = 'sidebar/menuItem.php';

    protected function init()
    {
        $this->aParams['title'] = '';
        $this->aParams['path'] = '';
    }

    public function setTitle($sTitle)
    {
        $this->aParams['title'] = $sTitle;
    }

    public function setPath($sPath)
    {
        $this->aParams['path'] = $sPath;
    }
}