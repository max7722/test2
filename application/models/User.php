<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 14:18
 */

namespace application\models;

use application\core\RecordPrototype;

/**
 * Class User
 * @property int id
 * @property string login
 * @property string password
 * @property int type
 * @property string phone
 * @property string address
 */
class User extends RecordPrototype
{
    public static function tableName()
    {
        return 'user';
    }

    public static function fields()
    {
        return ['id', 'login', 'password', 'type', 'phone', 'address'];
    }

    /** @var Cart */
    private $oCart;

    /** @var Order[] */
    private $aOrders;

    protected function getCart()
    {
        if (!isset($this->oCart)) {
            $this->oCart = Cart::findOne(['id_user' => $this->id]);
        }

        return $this->oCart;
    }

    protected function setCart($value)
    {
        $this->oCart = $value;
    }

    protected function getOrders()
    {
        if (!isset($this->aOrders)) {
            $this->aOrders = Order::findAll(['id_user' => $this->id]);
        }

        return $this->aOrders;
    }

    protected function setOrders($value)
    {
        $this->aOrders = $value;
    }
}