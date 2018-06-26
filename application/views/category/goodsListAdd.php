<?php
/** @var \application\models\Category $category */
?>
<div class="content">
    <h2 class="content-heading"><a href="/admin/category/goods/<?= $category->id ?>">Вернуться к списку товаров в <?= $category->name ?></a></h2>
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
            <?php if ($category->getDirtyGoods()): ?>
                <?php foreach ($category->getDirtyGoods() as $oGoods): ?>
                    <tr>
                        <th class="text-center" scope="row"><a href="/admin/goods/show/<?= $oGoods->id ?>"><?= $oGoods->id ?></a></th>
                        <td>
                            <a class="font-size-h5 font-w600" href="<?=$cb->sMainPath . '/admin/goods/show/' . $oGoods->id?>"><?=$oGoods->name?></a>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <div class="text-muted my-5"><?=$oGoods->getLittleDescription()?></div>
                        </td>
                        <td class="text-right">
                            <form method="post" action="/admin/category/editgoods/<?= $category->id ?>/<?= $oGoods->id ?>/add">
                                <button class="btn btn-sm btn-alt-primary" type="submit">Добавить</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
