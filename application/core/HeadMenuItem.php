<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 16.04.2018
 * Time: 0:27
 */

namespace application\core;

/**
 * Class HeadMenuItem
 * @package application\core
 * @property string title
 * @property string href
 */
class HeadMenuItem extends View
{
    protected $template = 'headMenuItem.php';

    protected function init()
    {
        $this->aParams['title'] = '';
        $this->aParams['href'] = '';
    }

    public function setTitle($value) {
        $this->aParams['title'] = $value;
    }

    public function setHref($value) {
        $this->aParams['href'] = $value;
    }
}