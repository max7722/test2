<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 23:00
 */
/** @var \application\core\View [] $items */
/** @var \application\core\view\CodebaseConfig $cb */

if (!empty($items)): ?>
    <footer id="page-footer" class="opacity-0" style="opacity: 1;">
        <? foreach ($items as $item): ?>
            <div class="footerItem"><?=$item->render()?></div>
        <? endforeach;?>
    </footer>
<? endif; ?>
