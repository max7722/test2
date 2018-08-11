<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 10.06.2018
 * Time: 11:52
 */

namespace application\controllers\admin;


use application\core\AdminController;

/**
 * Class Main
 * @package application\controllers\admin
 */
class Main extends AdminController
{
    public function actionIndex()
    {
        $this->oContent->head->title = 'Административный режим';

        $this->oContent->content->addItem((new \application\core\view\admin\Main()));

        $this->oContent->render();
    }
}