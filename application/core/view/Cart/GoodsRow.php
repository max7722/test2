<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 08.05.2018
 * Time: 23:38
 */

namespace application\core\view\Cart;


use application\core\model\Cart;
use application\core\View;

/**
 * Class GoodsRow
 * @package application\core\view\Cart
 * @property array cartItems
 */
class GoodsRow extends View
{
    protected $template = 'cart/goodsRow.php';

    protected function init()
    {
        $this->aParams['cartItems'] = Cart::getCart()->getItemsParsed();
    }

    /**
     * @param $oValue
     */
    protected function setCartItems($oValue)
    {
        $this->aParams['cartItems'] = $oValue;
    }
}