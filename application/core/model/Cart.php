<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 07.05.2018
 * Time: 22:18
 */

namespace application\core\model;


use application\models\Goods;
use application\models\OrderGoods;

/**
 * Класс заказа
 * Class Cart
 * @package application\core\model
 */
class Cart
{
    private static $oCart;

    protected $aCart = [];

    /**
     * @param string $oCart
     * @return Cart|bool|mixed
     */
    public static function getCart($oCart = '')
    {
        if (empty($oCart)) {
            $oCart = self::getSessionCart();
            if ($oCart) {
                self::$oCart = $oCart;
            } else {
                self::$oCart = new Cart();
            }
        }

        return self::$oCart;
    }

    private function __construct()
    {
    }

    /**
     * @return $this
     */
    public function setSessionCart()
    {
        $_SESSION['cart'] = serialize(self::$oCart);

        return $this;
    }

    /**
     * @return bool|mixed
     */
    protected static function getSessionCart()
    {
        if (!empty($_SESSION['cart'])) {
            return unserialize($_SESSION['cart']);
        }

        return false;
    }

    /**
     * @param Goods $oItem
     * @param int $iCount
     */
    public function addItem($oItem, $iCount = 1)
    {
        if (empty($this->aCart[$oItem->id])) {
            $this->aCart[$oItem->id] = [
                'item' => $oItem,
                'count' => $iCount,
            ];

            return;
        }

        $this->aCart[$oItem->id]['count'] += $iCount;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        $iCount = 0;
        if (!empty($this->aCart)) {
            foreach ($this->aCart as $aRow) {
                $iCount += $aRow['count'];
            }
        }

        return $iCount;
    }

    /**
     * @return int
     */
    public function getAllPrice()
    {
        $iPrice = 0;
        if (!empty($this->aCart)) {
            foreach ($this->aCart as $aRow) {
                $iPrice += $aRow['item']->price * $aRow['count'];
            }
        }

        return $iPrice;
    }

    /**
     * @param int $id
     * @param int $iCount
     * @return bool
     */
    public function removeItem($id, $iCount = 0)
    {
        if (empty($this->aCart[$id])) {
            return false;
        }

        if ($iCount) {
            $this->aCart[$id]['count'] -= $iCount;

            if ($this->aCart[$id]['count'] > 0) {
                return true;
            }
        }

        unset($this->aCart[$id]);

        return true;
    }

    /**
     * @return Cart
     */
    public function removeAllItems()
    {
        unset($this->aCart);

        return $this;
    }

    /**
     * Возвращает позиции заказа
     * @return array
     */
    public function getItems()
    {
        return $this->aCart;
    }

    /**
     * Возвращает распрсенные товары
     * @return array
     */
    public function getItemsParsed()
    {
        $aResultCart = $this->aCart;

        if (!empty($this->aCart)) {
            foreach ($aResultCart as $key => &$aCartRow) {
                $aCartRow['total'] = $aCartRow['item']->price * $aCartRow['count'];
            }
        }

        return $aResultCart;
    }

    /**
     * Сохраняет заказ
     * @param $idOrder
     */
    public function saveCart($idOrder)
    {
        foreach ($this->aCart as $aSingleCart) {
            /** @var Goods $oGoods */
            $oGoods = $aSingleCart['item'];
            $oOrderGoods = new OrderGoods();

            $oOrderGoods->id_order = $idOrder;
            $oOrderGoods->id_user = 0;
            $oOrderGoods->price = $aSingleCart['count'] * $oGoods->price;
            $oOrderGoods->name = $oGoods->name;
            $oOrderGoods->count = $aSingleCart['count'];
            $oOrderGoods->id_goods = $oGoods->id;

            $oOrderGoods->save();
        }
    }
}