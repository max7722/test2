<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.05.2018
 * Time: 17:09
 */

/** @var \application\models\Goods [] $goodsList */
/** @var \application\core\view\TemplateConfig $cb */

if (!empty($goodsList)): ?>
    <?php foreach ($goodsList as $oGoods): ?>
        <?php if ($oGoods->active): ?>
        <tr>
            <th class="text-center" scope="row"><img class="img-avatar" src="
                        <?php if ($oGoods->image): ?><?='/' . $oGoods->image?>
                        <?php else: ?><?=$cb->sMainPath . $cb->sWebFolder . '/images/default-goods.png'?>
                        <?php endif; ?>"></th>
            <td>
                <a class="font-size-h5 font-w600" href="<?=$cb->sMainPath . '/catalog/goods/' . $oGoods->id?>"><?=$oGoods->name?></a>
                <div class="text-muted my-5"><?=$oGoods->getLittleDescription()?></div>
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
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif;?>


