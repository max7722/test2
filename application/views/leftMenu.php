<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 23:00
 */
/** @var \application\core\View [] $items */

if (!empty($items)) {
    ?>
    <div class="leftMenu">
        <?
        foreach ($items as $item) {
            ?>
            <div class="leftMenuItem"><?=$item->render()?></div>
            <?
        }
        ?>
    </div>
    <?
}