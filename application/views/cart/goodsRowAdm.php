<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 09.05.2018
 * Time: 0:17
 */

/** @var \application\models\OrderGoods[] $orderList */
/** @var \application\core\view\TemplateConfig $cb */

if (!empty($orderList)): ?>
    <?php foreach ($orderList as $oOrder): ?>
        <tr>
            <th class="text-center" scope="row"><a href="/admin/goods/show/<?= $oOrder->id_goods ?>" ><?= $oOrder->id_goods ?></a></th>
            <td>
                <a class="font-size-h5 font-w600" href="/admin/catalog/goods/show<?= $oOrder->id_goods?>"><?=$oOrder->name?></a>
            </td>
            <td class="d-none d-sm-table-cell">
                <span class="badge badge-primary"><?=$oOrder->price?> руб.</span>
            </td>
            <td class="d-none d-sm-table-cell">
                <span class="badge badge-primary"><?= $oOrder->count ?> шт.</span>
            </td>
            <td class="d-none d-sm-table-cell">
                <span class="badge badge-primary"><?= $oOrder->price ?> руб.</span>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <span>Нет ни одного товара</span>
<?php endif; ?>


