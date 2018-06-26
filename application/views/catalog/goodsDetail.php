<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06.05.2018
 * Time: 17:08
 */

/** @var \application\models\Goods $goods */
/** @var \application\core\view\TemplateConfig $cb */

?>

<div class="content">
    <div class="block">
        <div class="block-content">
            <h1><?=$goods->name?></h1>
            <div class="row items-push">
                <div class="col-md-4" align="center"">
                        <img class="img-fluid" style="max-height: 250px;" src="
                        <?php if ($goods->image): ?><?='/' . $goods->image?>
                        <?php else: ?><?=$cb->sMainPath . $cb->sWebFolder . '/images/default-goods.png'?>
                        <?php endif; ?>" alt="">
                </div>
                <div class="col-md-6">
                    <?php if ($goods->categories): ?>
                        <span>Товар находится в следующих категориях:</span>
                    <br>
                        <?php foreach ($goods->categories as $oCategory): ?>
                            <a class="link-effect" href="<?=$cb->sMainPath . '/catalog/category/' . $oCategory->id?>"><?=$oCategory->name?></a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        Товар не находится ни в одной категории.
                    <?php endif; ?>
                    <h3>Описание</h3>
                    <?=$goods->description?>
                </div>
                <div class="col-md-2">
                    <div class="font-size-h4 font-w600 text-center"><?=$goods->price?> руб.</div>
                    <button type="button" class="btn btn-secondary min-width-125 js-cart-append" data-id="<?=$goods->id?>">В корзину</button>
                </div>
            </div>
        </div>
    </div>
</div>