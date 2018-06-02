<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 14:16
 */

namespace application\controllers;


use application\core\Controller;

class Main extends Controller
{
    public function actionIndex() {
        $this->oContent->head->title = 'Главная';

        $this->oContent->render();
    }
}