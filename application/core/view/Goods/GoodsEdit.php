<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 12.06.2018
 * Time: 11:57
 */

namespace application\core\view\Goods;


use application\core\View;
use application\core\view\TemplateConfig;
use application\models\Goods;

/**
 * Class GoodsEdit
 * @package application\core\view\Goods
 * @property Goods goods
 */
class GoodsEdit extends View
{
    protected $template = 'goods/goodsEditor.php';

    protected $aJsList = [
        TemplateConfig::ASSETS_FOLDER . '/js/plugins/ckeditor/ckeditor.js',
        TemplateConfig::ASSETS_FOLDER . '/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js',
        TemplateConfig::WEB_FOLDER . '/js/goods/config.js'
    ];

    protected function init()
    {
        $this->aParams['goods'] = '';
    }

    /**
     * @param Goods $value
     */
    protected function setGoods($value)
    {
        $this->aParams['goods'] = $value;
    }
}