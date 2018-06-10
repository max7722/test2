<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.06.2018
 * Time: 19:14
 */

namespace application\controllers;


use application\core\Controller;
use application\core\view\Profile\Profile as ViewProfile;

class Profile extends Controller
{
    public function actionIndex()
    {
        $oProfile = new ViewProfile();

        $this->oContent->content->addItem($oProfile);

        $this->oContent->render();
    }

    public function actionSettings()
    {
        $oProfile = new ViewProfile();

        $this->oContent->content->addItem($oProfile);

        $this->oContent->render();
    }

    public function actionPassword()
    {
        $oProfile = new ViewProfile();

        $this->oContent->content->addItem($oProfile);

        $this->oContent->render();
    }
}