<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.06.2018
 * Time: 19:25
 */

namespace application\core\view\Profile;


use application\core\View;
use application\models\Order;

/**
 * Class Profile
 * @package application\core\view\Profile
 * @property Order[] orderList
 */
class Profile extends View
{
    protected $template = 'profile/profile.php';

    protected function init()
    {
        $this->aParams['orderList'] = [];
    }

    /**
     * @param Order[] $value
     */
    protected function setOrderList($value)
    {
        $this->aParams['orderList'] = $value;
    }
}