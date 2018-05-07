<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.05.2018
 * Time: 17:09
 */

/** @var \application\models\Goods [] $goodsList */
/** @var \application\core\view\CodebaseConfig $cb */

if (!empty($goodsList)) {
    foreach ($goodsList as $oGoods) {
        ?>
        <tr>
            <th class="text-center" scope="row"><img class="img-avatar" src="<?=$cb->sMainPath . $cb->sWebFolder . '/'?><?=$oGoods->image?>"></th>
            <td>
                <a class="font-size-h5 font-w600" href="<?=$cb->sMainPath . '/catalog/goods/' . $oGoods->id?>"><?=$oGoods->name?></a>
                <div class="text-muted my-5"><?=$oGoods->description?></div>
            </td>
            <td class="d-none d-sm-table-cell">
                <span class="badge badge-primary"><?=$oGoods->price?> руб.</span>
            </td>
            <td class="text-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled js-cart-append" data-id="<?=$oGoods->id?>" data-toggle="tooltip" title="" data-original-title="Edit">
                        В корзину
                    </button>
                </div>
            </td>
        </tr>
        <?
    }
}?>


