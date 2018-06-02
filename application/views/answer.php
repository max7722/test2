<?php
/** @var string $text */
/** @var string $path */
?>
<div class="content">
    <div class="block">
        <div class="block-content">
            <? if ($text): ?>
                <div class="row justify-content-center py-20">
                    <?=$text?>
                </div>
            <? endif; ?>
            <? if ($path): ?>
                <div class="row justify-content-center py-20">
                    <a href="<?=$path?>">Назад</a>
                </div>
            <? endif; ?>
        </div>
    </div>
</div>

