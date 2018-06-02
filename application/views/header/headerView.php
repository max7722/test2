<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.05.2018
 * Time: 18:03
 */

/** @var int $countItemInCart */

?>

<div class="content-header">
    <div class="content-header-section">
        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-navicon"></i>
        </button>
    </div>
    <div class="content-header-section">
<!--        <a href="/">-->
<!--        <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--            <i class="si si-handbag"></i><span class="badge badge-primary"><span class="js-cart-count">--><?//=$countItemInCart?><!--</span> шт.</span>-->
<!--        </button>-->
<!--        </a>-->
        <a class="btn btn-rounded btn-dual-secondary" href="/cart">
            <i class="si si-handbag"></i><span class="badge badge-primary"><span class="js-cart-count"><?=$countItemInCart?></span> шт.</span>
        </a>
        <!--<div class="btn-group" role="group">
            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="si si-handbag"></i><span class="badge badge-primary"><span class="js-cart-count"><?/*=$countItemInCart*/?></span> шт.</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown" x-placement="bottom-end" style="position: absolute; transform: translate3d(-57px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="/cart">
                    <span><i class="si si-envelope-open mr-5"></i> Корзина</span>
                </a>
                <button class="btn dropdown-item js-cart-clear">
                    <i class="si si-note mr-5"></i> Очистить
                </button>
            </div>
        </div>-->
    </div>
</div>


