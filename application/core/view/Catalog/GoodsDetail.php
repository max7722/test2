<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06.05.2018
 * Time: 13:45
 */

namespace application\core\view\Catalog;


use application\core\View;

class GoodsDetail extends View
{
    protected $template = 'goodsDetail';

    protected function init()
    {
        $this->aParams['goods'] = '';
    }
}