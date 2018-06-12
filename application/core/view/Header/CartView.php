<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 10.06.2018
 * Time: 12:08
 */

namespace application\core\view\Header;


use application\core\model\Cart;
use application\core\View;

/**
 * Class CartView
 * @package application\core\view\Header
 * @property int countItemInCart
 */
class CartView extends View
{
    protected $template = 'header/cart.php';

    protected function init()
    {
        $this->aParams['countItemInCart'] = Cart::getCart()->getCount();
    }

    protected function setCountItemInCart($iValue)
    {
        $this->aParams['countItemInCart'] = $iValue;
    }
}