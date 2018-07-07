<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 20:38
 */

namespace application\core\view\Sidebar;


use application\core\View;
use application\core\ViewContent;

/**
 * Class SubMenuView
 * @package application\core\view\Sidebar
 * @property string title
 * @property-read View[] items
 */
class SubMenuView extends ViewContent
{
    protected $template = 'sidebar/subMenu.php';

    protected function init()
    {
        $this->aParams['title'] = '';
    }

    public function setTitle($sTitle)
    {
        $this->aParams['title'] = $sTitle;
    }
}