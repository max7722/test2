<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.04.2018
 * Time: 21:00
 */

namespace application\models;

use application\core\model\RecordPrototype;

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

            $aCategoryGoods = CategoryGoods::findAll(['id_category' => $this->id]);

            $aGoods = [];
            foreach ($aCategoryGoods as $oCategoryGoods) {
                $aGoods[] = Goods::findOne($oCategoryGoods->id_goods);
            }

            $this->aGoods = $aGoods;
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

        return $oCategoryGoods->save();
    }
}
