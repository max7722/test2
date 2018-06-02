<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 08.05.2018
 * Time: 23:28
 */

namespace application\core\view\Cart;


use application\core\model\Cart;
use application\core\View;
use application\core\view\TemplateConfig;

/**
 * Class CartView
 * @package application\core\view\Cart
 * @property View viewRow
 * @property int price
 */
class CartView extends View
{
    protected $template = 'cart/cartView.php';

    protected $aJsList = [
        TemplateConfig::WEB_FOLDER . '/js/cart/cart.js',
    ];

    protected function init()
    {
        $this->aParams['viewRow'] = '';
        $this->aParams['price'] = Cart::getCart()->getAllPrice();
    }

    protected function setPrice($iValue)
    {
        $this->aParams['price'] = $iValue;
    }

    protected function setViewRow($oView)
    {
        $this->aParams['viewRow'] = $oView;
    }

    public function initRender()
    {
        $this->aParams['active'] = Cart::getCart()->getCount();

        parent::initRender();
    }
}