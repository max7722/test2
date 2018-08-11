<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 21.04.2018
 * Time: 23:20
 */

namespace application\core\view;


use application\core\View;
use application\models\Goods;

/**
 * Class GoodslistRow
 * @package application\core\view
 * @property Goods goods
 */
class GoodsListRow extends View
{
    public $template = 'goodsListRow.php';

    protected function init()
    {
        $this->aParams['goods'] = '';
    }

    /**
     * @param Goods $value
     */
    public function setGoods($value)
    {
        $this->aParams['goods'] = $value;
    }
}