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
use application\core\view\TemplateConfig;

/**
 * Class Goods
 * @package model
 * @property int id
 * @property string name
 * @property int active
 * @property string description
 * @property string price
 * @property string image
 * @property int hit
 * @property int new
 * @property int luck
 * @property-read Category[] categories
 */
class Goods extends RecordPrototype
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @return array
     */
    public static function fields()
    {
        return ['id', 'name', 'active', 'description', 'price', 'image', 'hit', 'new', 'luck'];
    }

    /** @var array */
    protected $aListCategory;

    /**
     * @return array
     */
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

    /**
     * @return bool
     */
    public function delete()
    {
        $sql = 'DELETE FROM `category_goods` WHERE id_goods = ?';

        $db = DataBase::getInstance();
        $oQuery = $db->prepare($sql);

        $oQuery->execute([$this->id]);

        return parent::delete();
    }

    /**
     * @return string
     */
    public function getLittleDescription()
    {
        if (strlen($this->description) > 40) {
            return strip_tags(mb_substr($this->description, 0, 37) . '...');
        }

        return strip_tags($this->description);
    }
}
