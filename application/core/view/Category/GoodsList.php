<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 12.06.2018
 * Time: 16:10
 */

namespace application\core\view\Category;


use application\core\View;
use application\models\Category;

/**
 * Class GoodsList
 * @package application\core\view\Category
 * @property Category category
 */
class GoodsList extends View
{
    protected $template = 'category/goodsList.php';

    protected function init()
    {
        $this->aParams['category'] = [];
    }

    /**
     * @param Category $value
     */
    public function setCategory($value)
    {
        $this->aParams['category'] = $value;
    }
}