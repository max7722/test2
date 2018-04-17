<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.04.2018
 * Time: 21:06
 */

namespace application\models;

use application\core\RecordPrototype;

/**
 * Class CartGoods
 * @property int id
 * @property int id_cart
 * @property string name
 * @property int id_goods
 * @property int count
 * @property string price
 */
class CartGoods extends RecordPrototype
{
    public static function tableName()
    {
        return 'cart_goods';
    }

    public static function fields()
    {
        return ['id', 'id_cart', 'name', 'id_goods', 'count', 'price'];
    }
}
