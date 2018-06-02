<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 19:55
 */

/** @var \application\models\User $user */
/** @var \application\core\view\TemplateConfig $cb */
?>

<div class="content-side content-side-full content-side-user px-10 align-parent" style="height: 165px">

    <? if ($user): ?>
    <div class="sidebar-mini-visible-b align-v animated fadeIn">
        <img class="img-avatar img-avatar32" src="<?=$cb->assets_folder?>/img/avatars/avatar15.jpg" alt="">
    </div>
    <div class="sidebar-mini-hidden-b text-center">
            <a class="img-link" href="/profile">
                <img class="img-avatar" src="<?=$cb->assets_folder?>/img/avatars/avatar15.jpg" alt="">
            </a>
            <ul class="list-inline mt-10">
                <li class="list-inline-item">
                    <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="/profile"><?
                        if ($user) {
                            echo $user->login;
                        }
                        ?></a>
                </li>
    <!--            <li class="list-inline-item">todo
                    <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                        <i class="si si-drop"></i>
                    </a>
                </li>-->
                <li class="list-inline-item">
                    <a class="link-effect text-dual-primary-dark" href="/auth/logout">
                        <i class="si si-logout"></i>
                    </a>
                </li>
            </ul>
    </div>
    <? else: ?>
        <form action="/auth" method="post" novalidate="novalidate">
            <div class="form-group row">
                <div class="col-lg-12">
                    <input type="text" class="form-control" id="val-name" name="val-username" placeholder="Ваш логин">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12">
                    <input type="password" class="form-control" id="val-password" name="val-password" placeholder="Пароль" aria-describedby="val-password-error">
                </div>
            </div>
            <div class="form-group row">
                <a class="col-lg-6 link-effect" href="/auth/register">Регистрация</a>
                <div class="col-lg-5 ml-auto">
                    <button type="submit" class="btn btn-alt-primary">Войти</button>
                </div>
            </div>
        </form>
    <? endif; ?>
</div>
