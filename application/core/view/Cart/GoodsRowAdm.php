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
use application\core\view\TemplateConfig;
use application\models\OrderGoods;

/**
 * Class GoodsRow
 * @package application\core\view\Cart
 * @property OrderGoods[] orderList
 */
class GoodsRowAdm extends View
{
    protected $template = 'cart/goodsRowAdm.php';

    protected function init()
    {
        $this->aParams['orderList'] = [];
    }

    /**
     * @param $oValue
     */
    protected function setOrderList($oValue)
    {
        $this->aParams['orderList'] = $oValue;
    }
}