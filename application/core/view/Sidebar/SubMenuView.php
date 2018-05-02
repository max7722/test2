<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 20:38
 */

namespace application\core\view\Sidebar;


use application\core\View;

/**
 * Class SubMenuView
 * @package application\core\view\Sidebar
 * @property string title
 * @property-read View[] items
 */
class SubMenuView extends View
{
    protected $template = 'sidebar/subMenu.php';

    protected function init()
    {
        $this->aParams['items'] = [];
        $this->aParams['title'] = '';
    }

    public function setTitle($sTitle)
    {
        $this->aParams['title'] = $sTitle;
    }

    /**
     * @param View $oItem
     */
    public function addItems($oItem)
    {
        $this->aParams['items'][] = $oItem;
    }
}