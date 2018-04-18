<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.04.2018
 * Time: 21:34
 */

namespace application\core\view;


use application\core\View;
use application\models\Goods;

/**
 * Class GoodsDetail
 * @package application\core\view
 * @property Goods goods
 * @property string image
 */
class GoodsDetail extends View
{
    public $template = 'goodsDetail.php';

    protected function init()
    {
        $this->aParams['goods'] = '';
        $this->aParams['image'] = '';
    }

    public function setGoods($value)
    {
        $this->aParams['goods'] = $value;
    }

    public function setImage($value)
    {
        $this->aParams['image'] = $value;
    }
}