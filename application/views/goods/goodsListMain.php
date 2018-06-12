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
                <button>Добавить товар</button>
            </a>
            <table class="table table-hover table-vcenter">
                <tbody>
                <?=$goodsRowView->render()?>
                </tbody>
            </table>
        </div>
    </div>
</div>