<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 23:00
 */
/** @var \application\core\View [] $items */
/** @var \application\core\view\TemplateConfig $cb */

if (!empty($items)): ?>
    <footer id="page-footer" class="opacity-0" style="opacity: 1;">
        <?php foreach ($items as $item): ?>
            <div class="footerItem"><?=$item->render()?></div>
        <?php endforeach;?>
    </footer>
<?php endif; ?>
