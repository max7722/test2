<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 15:40
 */

namespace application\controllers;


use application\core\PageController;
use application\core\view\Page404;

class Controller404 extends PageController
{
    public function actionIndex()
    {
        $this->oContent->content->addItem(new Page404());

        $this->oContent->render();
    }
}