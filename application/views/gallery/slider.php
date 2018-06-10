<?php

/** @var \application\core\View $view */
/** @var string $title */
/** @var int $multiple */
/** @var \application\core\view\TemplateConfig $cb */
?>



<div class="block">
    <? if (!empty($title)): ?>
        <div class="block-header block-header-default">
            <h3 class="block-title"><?= $title ?></h3>
        </div>
    <? endif; ?>
    <? if (!empty($view)): ?>
        <div class="js-slider slick-dotted-inner slick-dotted-white"<? if ($multiple): ?> data-slides-to-show="3" data-center-mode="true" <? endif; ?> data-dots="true" data-arrows="true">
            <?= $view->render() ?>
        </div>
    <? endif; ?>
</div>
