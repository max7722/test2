﻿<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 09.05.2018
 * Time: 0:17
 */

/** @var \application\core\model\Cart $cartItems */
/** @var \application\core\view\TemplateConfig $cb */

if (!empty($cartItems)): ?>
    <?php foreach ($cartItems as $cartItem): ?>
        <?php
            /** @var \application\models\Goods $oGoods */
            $oGoods = $cartItem['item'];
        ?>
        <tr>
            <th class="text-center" scope="row"><img class="img-avatar" src="
                        <?php if ($oGoods->image): ?><?='/' . $oGoods->image?>
                        <?php else: ?><?=$cb->sMainPath . $cb->sWebFolder . '/images/default-goods.png'?>
                        <?php endif; ?>"></th>
            <td>
                <a class="font-size-h5 font-w600" href="<?=$cb->sMainPath . '/catalog/goods/' . $oGoods->id?>"><?=$oGoods->name?></a>
                <div class="text-muted my-5"><?=$oGoods->description?></div>
            </td>
            <td class="d-none d-sm-table-cell">
                <span class="badge badge-primary"><?=$oGoods->price?> руб.</span>
            </td>
            <td class="d-none d-sm-table-cell">
                <span class="badge badge-primary"><?=$cartItem['count']?> шт.</span>
            </td>
            <td class="d-none d-sm-table-cell">
                <span class="badge badge-primary"><?=$cartItem['total']?> руб.</span>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <span>Нет ни одного товара</span>
<?php endif; ?>


