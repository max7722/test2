<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.05.2018
 * Time: 18:03
 */

/** @var int $countItemInCart */
/** @var \application\core\View[] $items*/

?>

<div class="content-header">
    <? if (!empty($items)): ?>
        <? foreach ($items as $oView): ?>
            <?= $oView->render() ?>
        <? endforeach; ?>
    <? endif; ?>
</div>


