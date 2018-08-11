<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 13.06.2018
 * Time: 20:34
 */

namespace application\controllers;


use application\core\PageController;

/**
 * Class About
 * @package application\controllers
 */
class About extends PageController
{
    public function actionIndex()
    {
        $this->oContent->head->title = 'О компании';

        $oAbout = new \application\core\view\About\About();
        $this->oContent->content->addItem($oAbout);

        $this->oContent->render();
    }
}