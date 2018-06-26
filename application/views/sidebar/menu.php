<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 19:55
 */

/** @var \application\core\View [] $items */

?>

<!-- Side Navigation -->
<div class="content-side content-side-full">
    <ul class="nav-main">
        <?php foreach ($items as $item): ?>
            <?=$item->render();?>
        <?php endforeach; ?>
    </ul>
</div>
