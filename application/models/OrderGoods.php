<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.04.2018
 * Time: 21:05
 */

namespace application\models;

use application\core\model\RecordPrototype;

/**
 * Class OrderGoods
 * @property int id
 * @property int id_user
 * @property int id_goods
 * @property int id_order
 * @property string name
 * @property int count
 * @property string price
 */
class OrderGoods extends RecordPrototype
{
    public static function tableName()
    {
        return 'order_goods';
    }

    public static function fields()
    {
        return ['id', 'id_order', 'id_goods', 'name', 'count', 'price'];
    }
}
