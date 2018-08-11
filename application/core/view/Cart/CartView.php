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
 * @property string title
 * @property int id
 * @property int complete
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
        $this->aParams['title'] = '';
        $this->aParams['id'] = '';
        $this->aParams['complete'] = '';
        $this->aParams['price'] = Cart::getCart()->getAllPrice();
    }

    /**
     * @param int $iValue
     */
    protected function setPrice($iValue)
    {
        $this->aParams['price'] = $iValue;
    }

    /**
     * @param View $oView
     */
    protected function setViewRow($oView)
    {
        $this->aParams['viewRow'] = $oView;
    }

    /**
     * @param string $iValue
     */
    protected function setTitle($iValue)
    {
        $this->aParams['title'] = $iValue;
    }

    /**
     * @param int $iValue
     */
    protected function setId($iValue)
    {
        $this->aParams['id'] = $iValue;
    }

    /**
     * @param int $iValue
     */
    protected function setComplete($iValue)
    {
        $this->aParams['complete'] = $iValue;
    }

    protected function initRender()
    {
        $this->aParams['active'] = Cart::getCart()->getCount();

        parent::initRender();
    }
}