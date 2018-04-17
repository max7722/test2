<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.04.2018
 * Time: 21:04
 */

namespace application\models;

use application\core\model\RecordPrototype;

/**
 * Class Order
 * @property int id
 * @property int id_user
 * @property string datetime
 * @property int type_delivery
 * @property int status
 * @property string address
 * @property string phone
 * @property string price
 * @property OrderGoods[] orderList
 */
class Order extends RecordPrototype
{
    public static function tableName()
    {
        return 'order';
    }

    public static function fields()
    {
        return ['id', 'id_user', 'datetime', 'type_delivery', 'status', 'address', 'phone', 'price'];
    }

    private $aOrderList;

    protected function getOrderList()
    {
        if (!isset($this->aOrderList)) {
            $this->aOrderList = OrderGoods::findAll(['id_order' => $this->id]);
        }

        return $this->aOrderList;
    }

    protected function setOrderList($value)
    {
        $this->aOrderList = $value;
    }

}
