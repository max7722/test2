<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 23:00
 */
/** @var \application\core\View [] $items */

if (!empty($items)) {
    //todo
    ?>
    <head>
        <link href="/web/css/style.css" type="text/css" rel="stylesheet">
    </head>
    <div class="header">
        <?
        foreach ($items as $item) {
            ?>
            <div class="headerItem"><?=$item->render()?></div>
            <?
        }
        ?>
    </div>
    <?
}