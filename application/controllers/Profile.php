<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.06.2018
 * Time: 19:14
 */

namespace application\controllers;


use application\core\model\User;
use application\core\PageController;
use application\core\view\Profile\Profile as ViewProfile;
use application\models\Order;

class Profile extends PageController
{
    public function actionIndex()
    {
        $this->oContent->head->title = 'Профиль';

        $oProfile = new ViewProfile();

        $oProfile->orderList = Order::findAll(['id_user' => User::getUser()->getModel()->id]);

        $this->oContent->content->addItem($oProfile);

        $this->oContent->render();
    }
}