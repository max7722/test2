<?php
/** @var string $text */
/** @var string $path */
?>
<div class="content">
    <div class="block">
        <div class="block-content">
            <?php if ($text): ?>
                <div class="row justify-content-center py-20">
                    <?=$text?>
                </div>
            <?php endif; ?>
            <?php if ($path): ?>
                <div class="row justify-content-center py-20">
                    <a href="<?=$path?>">Назад</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

