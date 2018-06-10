<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 10.06.2018
 * Time: 10:13
 */

namespace application\core\view\Gallery;


use application\core\View;
use application\models\Goods;

/**
 * Class GoodstList
 * @package application\core\view\Gallery
 * @property-read Goods[] goodsList
 */
class GoodstList extends View
{
    protected $template = 'gallery/goodsList.php';

    protected function init()
    {
        $this->aParams['goodsList'] = [];
    }

    protected function initRender()
    {
        //todo
        if (count($this->aParams['goodsList']) <= 3) {
            $this->addGoods($this->aParams['goodsList']);
        }

        parent::initRender();
    }

    /**
     * @param Goods|Goods[] $mGoods
     */
    public function addGoods($mGoods)
    {
        if (is_array($mGoods)) {
            $this->aParams['goodsList'] = array_merge($this->aParams['goodsList'], $mGoods);
            return;
        }

        $this->aParams['goodsList'][] = $mGoods;
    }
}