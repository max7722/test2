<?php

/** @var \application\models\Order[] $orderList */
?>
<div class="content">
    <h2 class="content-heading">Личный кабинет</h2>
    <div class="block">
        <h4>Ваши заказы</h4>
        <? if (!empty($orderList)): ?>
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th>Статус</th>
                    <th class="d-none d-sm-table-cell">Создан</th>
                    <th class="d-none d-sm-table-cell">Тип доставки</th>
                    <th class="text-right">Цена</th>
                </tr>
                </thead>
                <tbody>
                <? foreach ($orderList as $oOrder): ?>
                    <tr>
                        <td>
                            <? if ($oOrder->status): ?>
                                <span class="badge badge-success">Обработан</span>
                            <? else: ?>
                                <span class="badge badge-warning">Не обработан</span>
                            <? endif; ?>
                        </td>
                        <td class="d-none d-sm-table-cell"><?= $oOrder->datetime ?></td>
                        <td class="d-none d-sm-table-cell"><?= $oOrder->getNameDelivery() ?></td>
                        <td class="text-right">
                            <span class="text-black"><?= $oOrder->price ?></span>
                        </td>
                    </tr>
                <? endforeach; ?>
                </tbody>
            </table>
        <? else: ?>
            У вас нет заказов
        <? endif; ?>
    </div>
</div>
