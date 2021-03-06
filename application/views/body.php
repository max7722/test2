<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 23:00
 */
/** @var \application\core\View $content */
/** @var \application\core\View $header */
/** @var \application\core\View $footer */
/** @var \application\core\View $leftMenu */
/** @var \application\core\View $head */
/** @var \application\core\view\TemplateConfig $cb */

?>
    <head class="no-focus">
        <?=$head->render()?>
    </head>
    <body>
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed page-header-modern page-header-inverse main-content-boxed side-trans-enabled">
            <?=$header->render()?>
            <?=$leftMenu->render()?>
            <?=$content->render()?>
            <?=$footer->render()?>
        </div>

        <?php if (!empty($cb->getJs())): ?>
            <?php foreach ($cb->getJs() as $sPath): ?>
                <script src="<?=$cb->sMainPath . $sPath?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>
    </body>

