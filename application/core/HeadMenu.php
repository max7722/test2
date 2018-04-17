<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 22:47
 */

namespace application\core;


class HeadMenu extends View
{
    protected $template = 'headMenu.php';

    protected function init()
    {
        $this->aParams['items'] = [];
    }

    public function addItem($oItem)
    {
        $this->aParams['items'][] = $oItem;
    }
}