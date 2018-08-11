<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 12.06.2018
 * Time: 14:53
 */

namespace application\core\view\Category;


use application\core\View;
use application\models\Category;

/**
 * Class CategoryList
 * @package application\core\view\Category
 * @property Category[] categories
 */
class CategoryList extends View
{
    protected $template = 'category/categoryList.php';

    protected function init()
    {
        $this->aParams['categories'] = [];
    }

    /**
     * @param Category[] $value
     */
    public function setCategories($value)
    {
        $this->aParams['categories'] = $value;
    }

}