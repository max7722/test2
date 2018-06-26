<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 08.05.2018
 * Time: 23:43
 */

/** @var int $price */
/** @var \application\core\View $viewRow */
/** @var int $active */
/** @var string $title */
/** @var int $complete */
/** @var int $id */

?>

<div class="content">
    <div class="block">
        <div class="block-content">
            <h1><?= $title ?></h1>
            <div class="col-12">
                <form method="post" action="/admin/order/show/<?= $id ?>">
                    <select name="select">
                       <option value="0" <?php if ($complete == 0): ?>selected<?php endif; ?>>Выполнен</option>
                       <option value="1" <?php if ($complete == 1): ?>selected<?php endif; ?>>Не выполнен</option>
                    </select>
                    <input type="submit">
                </form>
            </div>
            <table class="table table-hover table-vcenter">
                <?=$viewRow->render()?>
            </table>

            <div class="row items-push">
                <?php if (!empty($active)): ?>
                    <div class="col-md-4">
                        <h5>Общая сумма: <span><?=$price?></span> руб.</h5>
                    </div>
                <?php endif; ?>
            </div>

            <a href="/admin/order/list" class="link-effect">К списку</a>
        </div>
    </div>

</div>
