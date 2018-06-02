<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.05.2018
 * Time: 18:07
 */

namespace application\core\view\Header;


use application\core\model\Cart;
use application\core\View;

/**
 * Class HeaderView
 * @package application\core\view\Header
 * @property int countItemInCart
 */
class HeaderView extends View
{
    protected $template = 'header/headerView.php';

    protected function init()
    {
        $this->aParams['countItemInCart'] = Cart::getCart()->getCount();
    }

    protected function setCountItemInCart($iValue)
    {
        $this->aParams['countItemInCart'] = $iValue;
    }
}