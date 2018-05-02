<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 19:55
 */

/** @var \application\models\User $user */
/** @var \lib\codebase\Template $cb */
?>

<div class="content-side content-side-full content-side-user px-10 align-parent">
    <!-- Visible only in mini mode -->
    <div class="sidebar-mini-visible-b align-v animated fadeIn">
        <img class="img-avatar img-avatar32" src="<?=$cb->assets_folder?>/img/avatars/avatar15.jpg" alt="">
    </div>
    <!-- END Visible only in mini mode -->

    <!-- Visible only in normal mode -->
    <div class="sidebar-mini-hidden-b text-center">
        <a class="img-link" href="<?//todo?>">
            <img class="img-avatar" src="<?=$cb->assets_folder?>/img/avatars/avatar15.jpg" alt="">
        </a>
        <ul class="list-inline mt-10">
            <li class="list-inline-item">
                <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="<?//todo?>"><?
                    if ($user) {
                        echo $user->login;
                    }
                    ?></a>
            </li>
            <li class="list-inline-item">
                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                    <i class="si si-drop"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="link-effect text-dual-primary-dark" href="<?//todo?>">
                    <i class="si si-logout"></i>
                </a>
            </li>
        </ul>
    </div>
    <!-- END Visible only in normal mode -->
</div>
