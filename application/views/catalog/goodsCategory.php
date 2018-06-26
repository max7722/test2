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
                        <img class="img-fluid" src="<?php if ($category->image): ?><?='/' . $category->image ?>
                        <?php else: ?><?=\application\core\view\TemplateConfig::CATEGORY_DEFAULT_IMAGE ?>
                        <?php endif; ?>" alt="">
                    </div>
                </div>
                <div class="col-md-8">
                    <?=$category->description?>
                </div>
            </div>

            <?if (!empty($listViews)):?>
                <?php foreach ($listViews as $oView): ?>
                    <?=$oView->render()?>
                <?php endforeach; ?>
            <?endif;?>
        </div>
    </div>
</div>