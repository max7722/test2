<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 10.06.2018
 * Time: 22:05
 */

namespace application\core\view\Order;


use application\core\View;
use application\models\Order;

class OrderList extends View
{
    protected $template = 'order/admOrderList.php';

    protected function init()
    {
        $this->aParams['orderList'] = [];
    }

    /**
     * @param Order|Order[] $mOrder
     */
    public function addOrders($mOrder)
    {
        if (is_array($mOrder)) {
            $this->aParams['orderList'] = array_merge($this->aParams['orderList'], $mOrder);
            return;
        }

        $this->aParams['orderList'][] = $mOrder;
    }
}