<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 23:00
 */
/** @var \application\core\View [] $items */

if (!empty($items)): ?>
    <main id="main-container" style="overflow: hidden;">
        <?php foreach ($items as $item): ?>
            <?=$item->render()?>
        <?php endforeach; ?>
    </main>
<?php endif; ?>
