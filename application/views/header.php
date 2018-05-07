<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 23:00
 */
/** @var \application\core\View [] $items */

if (!empty($items)): ?>
    <header id="page-header">
        <? foreach ($items as $item): ?>
            <?=$item->render()?>
        <? endforeach; ?>
    </header>
<? endif;