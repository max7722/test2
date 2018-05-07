<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 23:00
 */
/** @var \application\core\View [] $items */

if (!empty($items)): ?>
    <main id="main-container">
        <? foreach ($items as $item): ?>
            <?=$item->render()?>
        <? endforeach; ?>
    </main>
<? endif; ?>
