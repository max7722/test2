<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 08.05.2018
 * Time: 23:35
 */

namespace application\core\view\Cart;


use application\core\View;

/**
 * Class TableGoods
 * @package application\core\view\Cart
 * @property View viewRow
 */
class TableGoods extends View
{
    protected $template = 'cart/tableGoods.php';

    protected function init()
    {
        $this->aParams['viewRow'] = '';
    }

    protected function setViewRow($oView)
    {
        $this->aParams['viewRow'] = $oView;
    }
}