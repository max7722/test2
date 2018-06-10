<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 22:51
 */

namespace application\core\view;

use application\core\View;

class Footer extends View
{
    protected $template = 'footer.php';

    protected function init()
    {
        $this->aParams['items'] = [];
    }

    /**
     * @param View $mItem
     */
    public function addItem($mItem)
    {
        $this->aParams[] = $mItem;
    }
}