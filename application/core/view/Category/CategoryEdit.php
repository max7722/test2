<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 12.06.2018
 * Time: 15:22
 */

namespace application\core\view\Category;


use application\core\View;
use application\core\view\TemplateConfig;
use application\models\Category;

/**
 * Class CategoryEdit
 * @package application\core\view\Category
 * @property Category category
 */
class CategoryEdit extends View
{
    protected $template = 'category/categoryEdit.php';

    protected $aJsList = [
        TemplateConfig::ASSETS_FOLDER . '/js/plugins/ckeditor/ckeditor.js',
        TemplateConfig::ASSETS_FOLDER . '/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js',
        TemplateConfig::WEB_FOLDER . '/js/goods/config.js'
    ];

    protected function init()
    {
        $this->aParams['category'] = '';
    }

    protected function setCategory($value)
    {
        $this->aParams['category'] = $value;
    }

}