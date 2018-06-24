<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 15:03
 */


ini_set('display_errors', 1);
require_once 'vendor/autoload.php';
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
\application\core\Route::start();