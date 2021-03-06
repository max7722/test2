<?php

/** @var \application\core\View $view */
/** @var string $title */
/** @var \application\core\view\TemplateConfig $cb */
/** @var int $multiple */
?>


<?php if (!empty($title)): ?>
    <h2 class="content-heading"><?= $title ?></h2>
<?php endif; ?>
<div class="block">
    <div class="block-content" style="height: 250px;">
        <div class="row items-push">
            <div class="col-12">
                <?php if (!empty($view)): ?>
                    <div class="js-slider slick-dotted-inner slick-dotted-white"<?php if ($multiple): ?> data-slides-to-show="3" data-center-mode="true" <?php endif; ?> data-dots="true" data-arrows="true">
                        <?= $view->render() ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
