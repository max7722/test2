<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.05.2018
 * Time: 17:09
 */

/** @var \application\models\Category [] $categories */
/** @var \application\core\view\TemplateConfig $cb */
?>
<div class="content">
    <h2 class="content-heading">Список категорий</h2>
    <a href="/admin/category/show"><button class="btn btn-sm btn-alt-primary" style="margin-bottom: 25px;">Добавить Категорию</button></a>
    <div class="block">
        <table class="table table-hover table-vcenter">
            <thead>
                <tr>
                    <th>ID Категории</th>
                    <th>Название</th>
                    <th>Описание</th>
                </tr>
            </thead>
            <tbody>
                <? if (!empty($categories)): ?>
                    <? foreach ($categories as $oCategory): ?>
                        <tr>
                            <th class="text-center" scope="row"><a href="/admin/category/show/<?= $oCategory->id ?>"><?= $oCategory->id ?></a></th>
                            <td>
                                <a class="font-size-h5 font-w600" href="<?=$cb->sMainPath . '/admin/category/show/' . $oCategory->id?>"><?=$oCategory->name?></a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <div class="text-muted my-5"><?=$oCategory->getLittleDescription()?></div>
                            </td>
                            <td class="text-right">
                                <a href="/admin/category/goods/<?= $oCategory->id ?>">Список товаров</a>
                            </td>
                        </tr>
                    <? endforeach; ?>
                <? endif; ?>
            </tbody>
        </table>
    </div>
</div>