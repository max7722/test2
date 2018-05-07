<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.05.2018
 * Time: 17:15
 */

namespace application\core\view\Catalog;


use application\core\View;

/**
 * Class GoodsTable
 * @package application\core\view\Catalog
 * @property View goodsRowView
 */
class GoodsTable extends View
{
    protected $template = 'catalog/goodsTable.php';

    protected function init()
    {
        $this->aParams['goodsRowView'] = '';
    }

    /**
     * @param View $oGoodsRowView
     */
    public function setGoodsRowView($oGoodsRowView)
    {
        $this->aParams['goodsRowView'] = $oGoodsRowView;
    }
}