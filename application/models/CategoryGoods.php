<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.04.2018
 * Time: 21:06
 */

namespace application\models;

use application\core\model\DataBase;
use application\core\model\RecordPrototype;

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

    public static function getDirtyGoods($idCategory)
    {
        $sql = 'SELECT `goods`.`id`, goods.name, goods.active, goods.description, goods.price, goods.image 
                    FROM `goods` 
                    WHERE `goods`.`id` NOT IN (SELECT `id_goods` FROM `category_goods` WHERE id_category = ?)';

        $db = DataBase::getInstance();
        $oQuery = $db->prepare($sql);

        $aGoods = [];
        if ($oQuery->execute([$idCategory])) {
            foreach ($oQuery->fetchAll() as $aRow) {
                $aGoods[] = new Goods($aRow);
            }
        }

        return $aGoods;
    }
}