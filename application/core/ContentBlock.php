<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 22:08
 */

namespace application\core;

/**
 * Class ContentBlock
 * @package application\core
 * @property-read array items
 */
class ContentBlock extends View
{
    protected function init()
    {
        $this->aParams['items'] = [];
    }

    public function addItems($oItem)
    {
        $this->aParams['items'][] = $oItem;
    }
}