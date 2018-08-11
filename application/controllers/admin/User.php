<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 10.06.2018
 * Time: 11:56
 */

namespace application\controllers\admin;


use application\core\AdminController;
use application\core\view\User\UserList;

/**
 * Class User
 * @package application\controllers\admin
 */
class User extends AdminController
{
    public function actionIndex()
    {
        $this->oContent->head->title = 'Список пользователей';

        $aUser = \application\models\User::findAll();

        $oUserList = new UserList();
        $oUserList->userList = $aUser;

        $this->oContent->content->addItem($oUserList);

        $this->oContent->render();
    }
}