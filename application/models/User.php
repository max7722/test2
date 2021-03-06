<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 14:18
 */

namespace application\models;

use application\core\model\RecordPrototype;

/**
 * Class User
 * @property int id
 * @property string login
 * @property string password
 * @property int type
 * @property string phone
 * @property string address
 * @property string mail
 * @property \application\core\model\Cart cart
 * @property Order[] orders
 */
class User extends RecordPrototype
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @return array
     */
    public static function fields()
    {
        return ['id', 'login', 'password', 'type', 'phone', 'address', 'mail'];
    }

    /** @var Cart */
    private $oCart;

    /** @var Order[] */
    private $aOrders;

    /**
     * @return Cart|static
     */
    protected function getCart()
    {
        if (!isset($this->oCart)) {
            $this->oCart = Cart::findOne(['id_user' => $this->id]);
        }

        return $this->oCart;
    }

    /**
     * @param $value
     */
    protected function setCart($value)
    {
        $this->oCart = $value;
    }

    /**
     * @return Order[]|static[]
     */
    protected function getOrders()
    {
        if (!isset($this->aOrders)) {
            $this->aOrders = Order::findAll(['id_user' => $this->id]);
        }

        return $this->aOrders;
    }

    /**
     * @param $value
     */
    protected function setOrders($value)
    {
        $this->aOrders = $value;
    }
}
