<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.05.2018
 * Time: 18:07
 */

namespace application\core\view\Header;


use application\core\View;
use application\core\ViewContent;

/**
 * Class HeaderView
 * @package application\core\view\Header
 * @property View[] items
 */
class HeaderView extends ViewContent
{
    protected $template = 'header/headerView.php';

    protected function init()
    {
    }
}