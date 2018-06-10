<?php
/** @var string[] $imageList */
?>
<? if (!empty($imageList)): ?>
    <? foreach ($imageList as $sImage): ?>
        <div align="center">
            <img class="img-fluid img-scalar" src="<?= $sImage ?>" >
        </div>
    <? endforeach; ?>
<? endif; ?>
