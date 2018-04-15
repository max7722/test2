<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 16.04.2018
 * Time: 0:18
 */

/** @var \application\core\View [] $items */

if (!empty($items)) {
    ?>
    <div class="head-menu">
        <?foreach ($items as $item) {
            ?><?=$item->render()?><?
        }?>
    </div>
    <?
}