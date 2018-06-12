<?php
/** @var \application\models\Category $category */
?>
<div class="content">
    <h2 class="content-heading">Список товаров для <?= $category->name ?></h2>
    <h4><a href="/admin/category/list">К списку всех категорий</a></h4>
    <a href="/admin/category/editgoods/<?= $category->id ?>"><button class="btn btn-sm btn-alt-primary" style="margin-bottom: 25px;">Добавить Товар</button></a>
    <div class="block">
        <table class="table table-hover table-vcenter">
            <thead>
            <tr>
                <th>ID Товара</th>
                <th>Название</th>
                <th>Описание</th>
            </tr>
            </thead>
            <tbody>
            <? if ($category->goods): ?>
                <? foreach ($category->goods as $oGoods): ?>
                    <tr>
                        <th class="text-center" scope="row"><a href="/admin/goods/show/<?= $oGoods->id ?>"><?= $oGoods->id ?></a></th>
                        <td>
                            <a class="font-size-h5 font-w600" href="<?=$cb->sMainPath . '/admin/goods/show/' . $oGoods->id?>"><?=$oGoods->name?></a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <div class="text-muted my-5"><?=$oGoods->getLittleDescription()?></div>
                        </td>
                        <td class="text-right">
                            <form method="post" action="/admin/category/goods/<?= $category->id ?>/<?= $oGoods->id ?>/delete">
                                <button class="btn btn-sm btn-alt-primary" type="submit">Удалить</button>
                            </form>
                        </td>
                    </tr>
                <? endforeach; ?>
            <? endif; ?>
            </tbody>
        </table>
    </div>
</div>
