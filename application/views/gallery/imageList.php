<?php
/** @var string[] $imageList */
?>
<?php if (!empty($imageList)): ?>
    <?php foreach ($imageList as $sImage): ?>
        <div align="center">
            <img class="img-fluid img-scalar" src="<?= $sImage ?>" >
        </div>
    <?php endforeach; ?>
<?php endif; ?>
