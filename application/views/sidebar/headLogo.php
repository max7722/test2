<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 19:54
 */

/** @var string $firstHalfTitle */
/** @var string $secondHalfTitle */
/** @var string $path */

?>
<!-- Side Header -->
<div class="content-header content-header-fullrow px-15">
    <!-- Mini Mode -->
    <div class="content-header-section sidebar-mini-visible-b">
        <!-- Logo -->
        <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                                </span>
        <!-- END Logo -->
    </div>
    <!-- END Mini Mode -->

    <!-- Normal Mode -->
    <div class="content-header-section text-center align-parent sidebar-mini-hidden">
        <!-- Close Sidebar, Visible only on mobile screens -->
        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
        <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
            <i class="fa fa-times text-danger"></i>
        </button>
        <!-- END Close Sidebar -->

        <!-- Logo -->
        <div class="content-header-item">
            <a class="link-effect font-w700" href="<?=$path?>">
                <i class="si si-fire text-primary"></i>
                <span class="font-size-xl text-dual-primary-dark"><?=$firstHalfTitle?></span><span class="font-size-xl text-primary"><?=$secondHalfTitle?></span>
            </a>
        </div>
        <!-- END Logo -->
    </div>
    <!-- END Normal Mode -->
</div>
<!-- END Side Header -->
