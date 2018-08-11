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
 * Class Cart
 * @property int id
 * @property int id_user
 * @property int count
 * @property string price
 * @property CartGoods[] goods
 */
class Cart extends RecordPrototype
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @return array
     */
    public static function fields()
    {
        return ['id', 'id_user', 'count', 'price'];
    }

    /** @var CartGoods[] */
    private $aCartGoods;

    /**
     * @return CartGoods[]|bool
     */
    protected function getGoods()
    {
        if (!isset($this->aCartGoods)) {
            $this->aCartGoods = CartGoods::deleteAll(['id_cart' => $this->id]);
        }

        return $this->aCartGoods;
    }

    /**
     * @param $value
     */
    protected function setGoods($value)
    {
        $this->aCartGoods = $value;
    }
}
