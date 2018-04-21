<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.04.2018
 * Time: 21:44
 */

namespace application\core\view;


use application\core\View;
use application\models\Category;
use application\models\Goods;

/**
 * Class GoodsList
 * @package application\core\view
 * @property View goodsRowView
 * @property Category category
 */
class GoodsList extends View
{
    public $template = 'goodsList.php';

    protected function init()
    {
        $this->aParams['goodsRowView'] = '';
        $this->aParams['category'] = '';
    }

    public function setGoodsRowView($value)
    {
        $this->aParams['goodsRowView'] = $value;
    }

    /**
     * @param Category $value
     */
    public function setCategory($value)
    {
        $this->aParams['category'] = $value;
    }
}