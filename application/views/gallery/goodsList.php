<?php
/** @var \application\models\Goods[] $goodsList */

?>
<?php if (!empty($goodsList)): ?>
    <?php foreach ($goodsList as $oGoods): ?>
        <div align="center">
            <a href="/catalog/goods/<?= $oGoods->id ?>"><?= $oGoods->name ?></a>
            <img class="img-fluid img-scalar" src="<?php if ($oGoods->image): ?><?= $oGoods->image ?><?php else: ?><?= \application\core\view\TemplateConfig::GOODS_DEFAULT_IMAGE ?><?php endif; ?>" style="width=200px; height: 200px">
        </div>
    <?php endforeach; ?>
<?php endif; ?>
