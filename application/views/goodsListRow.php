<?php
/** @var \application\models\Goods[] $goods */
?>
<table class="goodsList">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>price</th>
    </tr>
    <?foreach ($goods as $item) {?>
        <tr class="goodsPosition">
            <th><a class="goods-name" href="/catalog/goods/<?=$item->id?>"><?=$item->name?></a></th>
            <th><span class="goods-description"><?=$item->description?></span></th>
            <th><span class="goods-price"><?=$item->price?></span></th>
        </tr>
    <?}?>
</table>
