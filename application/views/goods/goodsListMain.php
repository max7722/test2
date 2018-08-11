<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06.05.2018
 * Time: 17:08
 */

/** @var \application\core\View $goodsRowView */
/** @var \application\core\view\TemplateConfig $cb */

?>

<div class="content">
    <div class="block">
        <div class="block-content">
            <h1>Список товаров</h1>
            <a href="/admin/goods/show">
                <button class="btn btn-sm btn-alt-primary" style="margin-bottom: 25px;">Добавить товар</button>
            </a>
            <table class="table table-hover table-vcenter">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Навзание</th>
                        <th>Описание</th>
                        <th>Цена</th>
                    </tr>
                </thead>
                <tbody>
                <?=$goodsRowView->render()?>
                </tbody>
            </table>
        </div>
    </div>
</div>