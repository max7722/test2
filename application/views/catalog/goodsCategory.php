<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06.05.2018
 * Time: 17:08
 */

/** @var \application\models\Category $category */
/** @var \application\core\View[] $listViews */
/** @var \application\core\view\TemplateConfig $cb */

?>


<div class="content">
    <div class="block">
        <div class="block-content">
            <h1><?=$category->name?></h1>
            <div class="row items-push">
                <div class="col-md-4">
                    <div class="">
                        <img class="img-fluid" src="
                        <? if ($category->image): ?><?=$cb->sMainPath . $cb->sWebFolder . '/' . $category->image?>
                        <? else: ?><?=$cb->sMainPath . $cb->sWebFolder . '/images/default-category.jpg'?>
                        <? endif; ?>" alt="">
                    </div>
                </div>
                <div class="col-md-8">
                    <?=$category->description?>
                </div>
            </div>

            <?if (!empty($listViews)):?>
                <?foreach ($listViews as $oView):?>
                    <?=$oView->render()?>
                <?endforeach;?>
            <?endif;?>
        </div>
    </div>
</div>