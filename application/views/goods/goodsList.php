<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.05.2018
 * Time: 17:09
 */

/** @var \application\models\Goods [] $goodsList */
/** @var \application\core\view\TemplateConfig $cb */

if (!empty($goodsList)) {
    foreach ($goodsList as $oGoods) {
        ?>
        <tr>
            <th class="text-center" scope="row"><a href="/admin/goods/show/<?= $oGoods->id ?>"><?= $oGoods->id ?></a></th>
            <td>
                <a class="font-size-h5 font-w600" href="<?=$cb->sMainPath . '/admin/goods/show/' . $oGoods->id?>"><?=$oGoods->name?></a>
            </td>
            <td class="d-none d-sm-table-cell">
                <div class="text-muted my-5"><?=$oGoods->getLittleDescription()?></div>
            </td>
            <td class="d-none d-sm-table-cell">
                <span class="badge badge-primary"><?=$oGoods->price?> руб.</span>
            </td>
        </tr>
        <?
    }
}?>


