<?php
/** @var \application\core\View $hit */
/** @var \application\core\View $slider */
/** @var \application\core\View $new */
/** @var \application\core\View $luck */
/** @var \application\core\view\TemplateConfig $cb */

?>
<div class="bg-image" style="background-image: url('<?=$cb->sWebFolder . '/images/slider/1.jpg'?>');">
    <div class="bg-black-op-75">
        <div class="content content-top content-full text-center">
            <div class="py-20">
                <h1 class="h2 font-w700 text-white mb-10">Лучший выбор</h1>
                <h2 class="h4 font-w400 text-white-op mb-0">Магазин бытовой техники</h2>
            </div>
        </div>
    </div>
</div>
<? if (!empty($slider)): ?>
    <br>
    <div style="height: 450px">
        <?= $slider->render() ?>
    </div>
<? endif; ?>
<? if (!empty($hit)): ?>
    <br>
    <div class="content">
        <?= $hit->render() ?>
    </div>
<? endif; ?>
<? if (!empty($new)): ?>
    <br>
    <div class="content">
        <?= $new->render() ?>
    </div>
<? endif; ?>
<? if (!empty($luck)): ?>
    <br>
    <div class="content">
        <?= $luck->render() ?>
    </div>
<? endif; ?>