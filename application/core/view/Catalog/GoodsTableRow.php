<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.05.2018
 * Time: 17:18
 */

namespace application\core\view\Catalog;


use application\core\View;
use application\core\view\CodebaseConfig;
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
        CodebaseConfig::WEB_FOLDER . '/js/cart/cart.js',
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