<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 23:00
 */
/** @var \application\core\View [] $items */

if (!empty($items)): ?>
    <nav id="sidebar">
        <?php foreach ($items as $item): ?>
            <div class="leftMenuItem"><?=$item->render()?></div>
        <?php endforeach; ?>
    </nav>
<?php endif;
