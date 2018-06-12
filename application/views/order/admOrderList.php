<?php
/** @var \application\models\Order[] $orderList */
?>
<div class="content">
    <h2 class="content-heading">Список заказов</h2>
    <div class="block block-rounded">
        <div class="block-content">
            <? if (!empty($orderList)): ?>
                <table class="table table-borderless table-striped">
                    <thead>
                    <tr>
                        <th style="width: 100px;">ID</th>
                        <th>Статус</th>
                        <th class="d-none d-sm-table-cell">Создан</th>
                        <th class="d-none d-sm-table-cell">Тип доставки</th>
                        <th class="d-none d-sm-table-cell">Пользователь</th>
                        <th class="text-right">Цена</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach ($orderList as $oOrder): ?>
                        <tr>
                            <td>
                                <a class="font-w600" href="/admin/order/show/<?= $oOrder->id ?>"><?= $oOrder->id ?></a>
                            </td>
                            <td>
                                <? if ($oOrder->status): ?>
                                    <span class="badge badge-success">Завершен</span>
                                <? else: ?>
                                    <span class="badge badge-warning">Новый</span>
                                <? endif; ?>
                            </td>
                            <td class="d-none d-sm-table-cell"><?= $oOrder->datetime ?></td>
                            <td class="d-none d-sm-table-cell"><?= $oOrder->getNameDelivery() ?></td>
                            <td class="d-none d-sm-table-cell">
                                <a href="/admin/user/show/<?= $oOrder->id_user ?>"><?= $oOrder->getNameUser()?></a>
                            </td>
                            <td class="text-right">
                                <span class="text-black"><?= $oOrder->price ?></span>
                            </td>
                        </tr>
                    <? endforeach; ?>
                    </tbody>
                </table>
            <? else: ?>
                Список заказов пуст
            <? endif; ?>
        </div>
    </div>
</div>