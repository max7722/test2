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
 * Class Delivery
 * @property int id
 * @property string name
 */
class Delivery extends RecordPrototype
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'delivery';
    }

    /**
     * @return array
     */
    public static function fields()
    {
        return ['id', 'name'];
    }
}