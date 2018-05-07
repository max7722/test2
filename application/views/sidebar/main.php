<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 19:55
 */

/** @var \application\core\View $head */
/** @var \application\core\View $user */
/** @var \application\core\View $menu */
?>

<div id="sidebar-scroll">
    <div class="sidebar-content">
        <?=$head->render()?>
        <?=$user->render()?>
        <?=$menu->render()?>
    </div>
</div>
