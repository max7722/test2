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



?><?=$header->render()?><?
?><?=$leftMenu->render()?><?
?><?=$content->render()?><?
?><?=$footer->render()?><?