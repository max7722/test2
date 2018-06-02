<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06.05.2018
 * Time: 19:31
 */

/** @var \application\core\view\TemplateConfig $cb */

?>

<div class="content content-full">
    <div class="py-30 text-center">
        <div class="display-3 text-danger">
            <i class="fa fa-warning"></i> 404
        </div>
        <h1 class="h2 font-w700 mt-30 mb-10">Oops.. You just found an error page..</h1>
        <h2 class="h3 font-w400 text-muted mb-50">We are sorry but the page you are looking for was not found..</h2>
        <a class="btn btn-hero btn-rounded btn-alt-secondary" href="<?=$cb->sMainPath?>">
            <i class="fa fa-arrow-left mr-10"></i> Вернуться на главную
        </a>
    </div>
</div>
