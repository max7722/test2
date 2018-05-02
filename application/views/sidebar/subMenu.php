<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 20:44
 */

/** @var \application\core\View[] $items */
/** @var string $title */
?>
<li>
    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide"><?=$title?></span></a>
    <ul>
        <?
            foreach ($items as $item) {
                echo $item->render();
            }
        ?>
    </ul>
</li>
