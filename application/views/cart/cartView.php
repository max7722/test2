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

?>

<div class="content">
    <div class="block">
        <div class="block-content">
            <h1>Корзина</h1>
                <table class="table table-hover table-vcenter">
                    <?=$viewRow->render()?>
                </table>

                <div class="row items-push">
                    <? if (!empty($active)): ?>
                        <div class="col-md-4">
                            <h5>Общая сумма: <span><?=$price?></span> руб.</h5>
                        </div>
                        <div class="col-md-2 ml-auto">
                            <button type="button" class="btn btn-primary min-width-125 js-cart-clear">Очистить</button>
                        </div>
                        <div class="col-md-2">
                            <a href="/cart/checkout">
                                <button type="button" class="btn btn-primary min-width-125">Оформить заказ</button>
                            </a>
                        </div>
                    <? endif; ?>
                </div>
        </div>
    </div>

</div>
