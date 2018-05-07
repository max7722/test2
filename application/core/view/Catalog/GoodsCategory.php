<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06.05.2018
 * Time: 17:04
 */

namespace application\core\view\Catalog;


use application\core\View;
use application\models\Category;

/**
 * Class GoodsCategory
 * @package application\core\view\Catalog
 * @property Category category
 * @property-read View[] listViews
 */
class GoodsCategory extends View
{
    protected $template = 'catalog/goodsCategory.php';

    protected function init()
    {
        $this->aParams['category'] = '';
        $this->aParams['listViews'] = '';
    }

    /**
     * @param  Category $oCategory
     */
    protected function setCategory($oCategory)
    {
        $this->aParams['category'] = $oCategory;
    }

    /**
     * @param View $oView
     */
    public function addView($oView)
    {
        $this->aParams['listViews'][] = $oView;
    }
}