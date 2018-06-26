<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.05.2018
 * Time: 17:18
 */

namespace application\core\view\Catalog;


use application\core\View;
use application\core\view\TemplateConfig;
use application\models\Goods;

/**
 * Class GoodsTableRow
 * @package application\core\view\Catalog
 * @property-read Goods[] goodsList
 */
class GoodsTableRow extends View
{
    protected $template = 'catalog/goodsTableRow.php';

    protected $aJsList = [
        TemplateConfig::WEB_FOLDER . '/js/cart/buyCart.js',
        TemplateConfig::ASSETS_FOLDER . '/js/pages/be_ui_activity.js',
        TemplateConfig::ASSETS_FOLDER . '/js/plugins/bootstrap-notify/bootstrap-notify.min.js',
        TemplateConfig::ASSETS_FOLDER . '/js/plugins/sweetalert2/sweetalert2.min.js',
        TemplateConfig::ASSETS_FOLDER . '/js/plugins/sweetalert2/es6-promise.auto.min.js',
    ];

    protected function init()
    {
        $this->aParams['goodsList'] = '';
    }

    /**
     * @param Goods[] $aGoods
     */
    public function addGoods($aGoods)
    {
        $this->aParams['goodsList'] = $aGoods;
    }
}