<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 15:40
 */

namespace application\controllers;


use application\core\Controller;

class Controller404 extends Controller
{
    public function actionIndex()
    {
        echo 'NO';
    }
}