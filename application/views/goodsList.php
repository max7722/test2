<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.04.2018
 * Time: 21:49
 */



/** @var \application\models\Category $category */
/** @var \application\models\Goods [] $goodsList */

if (!empty($goodsList)) {?>
    <table class="goodsList">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>price</th>
            </tr>
        <?foreach ($goodsList as $item) {?>
            <tr class="goodsPosition">
                <th><a class="goods-name" href="/catalog/goods/<?=$item->id?>"><?=$item->name?></a></th>
                <th><span class="goods-description"><?=$item->description?></span></th>
                <th><span class="goods-price"><?=$item->price?></span></th>
            </tr>
        <?}?>
    </table>
<?
}?>

