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
 * Class CategoryGoods
 * @property int id
 * @property int id_category
 * @property int id_goods
 */
class CategoryGoods extends RecordPrototype
{
    public static function tableName()
    {
        return 'category_goods';
    }

    public static function fields()
    {
        return ['id', 'id_category', 'id_goods'];
    }
}