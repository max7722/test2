<?php
/** @var \application\models\Goods[] $goodsList */

?>
<? if (!empty($goodsList)): ?>
    <? foreach ($goodsList as $oGoods): ?>
        <div align="center">
            <a href="/catalog/goods/<?= $oGoods->id ?>"><?= $oGoods->name ?></a>
            <img class="img-fluid img-scalar" src="<?= $oGoods->image ?>" style="height: 200px">
        </div>
    <? endforeach; ?>
<? endif; ?>
