<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.04.2018
 * Time: 21:00
 */

namespace application\models;

use application\core\model\DataBase;
use application\core\model\RecordPrototype;
use function Couchbase\basicDecoderV1;

/**
 * Class Category
 * @property int id
 * @property string name
 * @property int active
 * @property string description
 * @property string image
 * @property-read Goods [] goods
 */
class Category extends RecordPrototype
{
    public static function tableName()
    {
        return 'category';
    }

    public static function fields()
    {
        return ['id', 'name', 'active', 'description', 'image'];
    }

    /** @var null|Goods [] */
    private $aGoods;

    protected function getGoods()
    {
        if (!isset($this->goods)) {
            $this->aGoods = [];

            $sql = 'SELECT `goods`.`id`, goods.name, goods.active, goods.description, goods.price, goods.image 
                    FROM `category_goods` 
                    JOIN `goods` ON `goods`.`id` = id_goods 
                    WHERE id_category = ?';

            $db = DataBase::getInstance();
            $oQuery = $db->prepare($sql);

            if ($oQuery->execute([$this->id])) {
                foreach ($oQuery->fetchAll() as $aRow) {
                    $this->aGoods[] = new Goods($aRow);
                }
            }
        }

        return $this->aGoods;
    }

    /**
     * @param $idGoods
     * @return bool
     */
    public function deleteGoodsOfCategory($idGoods)
    {
        $oCategoryGoods = CategoryGoods::findOne([ 'id_goods' => $idGoods, 'id_category' => $this->id]);

        return $oCategoryGoods->delete();
    }

    /**
     * @param Goods $oGoods
     */
    public function addGoods($oGoods)
    {
        $oCategoryGoods = new CategoryGoods();
        $oCategoryGoods->id_category = $this->id;

        $oCategoryGoods->id_goods = $oGoods->id;

        if ($oCategoryGoods->save()) {
            $this->aGoods[] = $oGoods;

            return True;
        }

        return False;
    }

    public function getLittleDescription()
    {
        if (strlen($this->description) > 40) {
            return strip_tags(mb_substr($this->description, 0, 37) . '...');
        }

        return strip_tags($this->description);
    }

    /**
     * @return Goods[]
     */
    public function getDirtyGoods()
    {
        return CategoryGoods::getDirtyGoods($this->id);
    }
}
