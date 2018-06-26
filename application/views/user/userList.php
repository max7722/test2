<?php
/** @var \application\models\User[] $userList */
?>
<div class="content">
    <h2 class="content-heading">Список Пользователей</h2>
    <div class="block">
        <table class="table table-hover table-vcenter">
            <thead>
                <tr>
                    <th>ID Пользователя</th>
                    <th>Логин</th>
                    <th>Почта</th>
                    <th>Пароль</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($userList): ?>
                <?php foreach ($userList as $oUser): ?>
                    <tr>
                        <th scope="row"><?= $oUser->id ?></th>
                        <td class="d-none d-sm-table-cell">
                            <div class="text-muted my-5"><?=$oUser->login ?></div>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <div class="text-muted my-5"><?=$oUser->mail ?></div>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <div class="text-muted my-5"><?=$oUser->password ?></div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>