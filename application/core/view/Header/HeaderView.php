<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.05.2018
 * Time: 18:07
 */

namespace application\core\view\Header;


use application\core\model\Cart;
use application\core\View;

/**
 * Class HeaderView
 * @package application\core\view\Header
 * @property View[] items
 */
class HeaderView extends View
{
    protected $template = 'header/headerView.php';

    protected function init()
    {
        $this->aParams['items'] = [];
    }

    /**
     * @param View $oValue
     */
    public function addItem($oValue)
    {
        $this->aParams['items'][] = $oValue;
    }
}