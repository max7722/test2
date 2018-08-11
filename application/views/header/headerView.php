<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.05.2018
 * Time: 18:03
 */

/** @var int $countItemInCart */
/** @var \application\core\View[] $items*/

?>

<div class="content-header">
    <?php if (!empty($items)): ?>
        <?php foreach ($items as $oView): ?>
            <?= $oView->render() ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>


