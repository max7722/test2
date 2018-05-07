<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.04.2018
 * Time: 20:59
 */

namespace application\models;

use application\core\model\DataBase;
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
 * @property-read Category[] categories
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

    protected $aListCategory;

    public function getCategories()
    {
        if (!isset($this->aListCategory)) {
            $this->aListCategory = [];

            $sql = 'SELECT `category`.`id`, category.name, category.active, category.description, category.image 
                    FROM `category_goods` 
                    JOIN `category` ON `category`.`id` = id_category
                    WHERE id_goods = ?';

            $db = DataBase::getInstance();
            $oQuery = $db->prepare($sql);

            if ($oQuery->execute([$this->id])) {
                foreach ($oQuery->fetchAll() as $aRow) {
                    $this->aListCategory[] = new Category($aRow);
                }
            }
        }

        return $this->aListCategory;
    }
}
