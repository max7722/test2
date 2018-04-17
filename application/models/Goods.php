<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.04.2018
 * Time: 20:59
 */

namespace application\models;

use application\core\model\RecordPrototype;

/**
 * Class Goods
 * @package model
 * @property int id
 * @property string name
 * @property int active
 * @property string description
 * @property string price
 * @property string image
 */
class Goods extends RecordPrototype
{
    public static function tableName()
    {
        return 'goods';
    }

    public static function fields()
    {
        return ['id', 'name', 'active', 'description', 'price', 'image'];
    }
}
