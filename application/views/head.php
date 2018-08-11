<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06.05.2018
 * Time: 19:10
 */

/** @var string $title */
/** @var \application\core\view\TemplateConfig $cb */
/** @var string[] $cssList */

?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<title><?=$title?></title>

<link rel="shortcut icon" href="<?=$cb->assets_folder?>/img/favicons/favicon.png">
<link rel="icon" type="image/png" sizes="192x192" href="<?=$cb->assets_folder?>/img/favicons/favicon-192x192.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?=$cb->assets_folder?>/img/favicons/apple-touch-icon-180x180.png">

<link rel="stylesheet" id="css-main" href="<?=$cb->assets_folder?>/css/codebase.min.css">
<link rel="stylesheet" id="css-main" href="<?=$cb->assets_folder?>/js/plugins/sweetalert2/sweetalert2.min.css">
<?php if (!empty($cssList)): ?>
    <?php foreach ($cssList as $sPath): ?>
        <link rel="stylesheet" href='<?=$sPath?>'>
    <?php endforeach; ?>
<?php endif; ?>

<!--Може пригодится-->
<?php /*if ($cb->theme) { */?><!--
    <link rel="stylesheet" id="css-theme" href="<?php /*echo $cb->assets_folder; */?>/css/themes/<?php /*echo $cb->theme; */?>.min.css">
--><?php /*} */?>
