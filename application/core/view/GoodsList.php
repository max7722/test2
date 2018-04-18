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
 * @property-read Goods goodsList
 * @property Category category
 */
class GoodsList extends View
{
    public $template = 'goodsList.php';

    protected function init()
    {
        $this->aParams['goodsList'] = [];
        $this->aParams['category'] = '';
    }

    /**
     * @param $oGoods
     */
    public function addGoods($oGoods)
    {
        //todo поправить
        $this->aParams['goodsList'] = $oGoods;
    }

    /**
     * @param Category $value
     */
    public function setCategory($value)
    {
        $this->aParams['category'] = $value;
    }
}