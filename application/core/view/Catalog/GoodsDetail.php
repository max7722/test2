<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06.05.2018
 * Time: 13:45
 */

namespace application\core\view\Catalog;


use application\core\View;
use application\core\view\TemplateConfig;

/**
 * Class GoodsDetail
 * @package application\core\view\Catalog
 */
class GoodsDetail extends View
{
    protected $template = 'catalog/goodsDetail.php';

    protected $aJsList = [
        TemplateConfig::WEB_FOLDER . '/js/cart/buyCart.js',
    ];

    protected function init()
    {
        $this->aParams['goods'] = '';
    }

    public function setGoods($value)
    {
        $this->aParams['goods'] = $value;
    }
}