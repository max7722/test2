<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 31.05.2018
 * Time: 21:56
 */

namespace application\controllers;


use application\core\Controller;
use application\core\model\User;
use application\core\Route;
use application\core\view\Page404;
use application\models\RegUser;
use application\models\User as ModelUser;
use application\core\view\Answer;
use application\core\view\Auth\AuthForm;
use application\core\view\Auth\RegForm;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Auth extends Controller
{
    public function actionIndex()
    {
        $sUserName = $this->getPostData('val-username');
        $sPassword = $this->getPostData('val-password');

        if ($sUserName or $sPassword) {
            $oUser = User::getUser();

            $bIsLogin = $oUser->login($sUserName, $sPassword);
            if ($bIsLogin) {
                header('Location: /');
                exit;
            }

            $oForm = new AuthForm();

            $oForm->name = $sUserName;
            $oForm->password = $sPassword;
            $oForm->error = true;
        } else {
            $oForm = new AuthForm();
        }

        $this->oContent->content->addItem($oForm);

        $this->oContent->render();
    }

    public function actionRegister()
    {
        $sName = $this->getPostData('val-username');
        $sPassword = $this->getPostData('val-password');
//        $sRetryPassword = $this->getPostData('val-confirm-password');
        $sEmail = $this->getPostData('val-email');
        $sAgreed = $this->getPostData('val-terms');

        if ($sName) {
            if ($this->checkUserExist($sName)) {
                $oForm = new RegForm();

                $oForm->agreed = $sAgreed;
//                $oForm->retryPassword = $sRetryPassword;
                $oForm->email = $sEmail;
                $oForm->password = $sPassword;
                $oForm->name = $sName;
                $oForm->error = 1;
            } else {
                $oForm = new Answer();
                $oRegUser = new RegUser();

                try {
                    $oRegUser->mail = $sEmail;
                    $oRegUser->name = $sName;
                    $oRegUser->password = $sPassword;
                    $oRegUser->hash = $this->getHash($sName);

                    $sPath = $this->getFullPathToConfirm() . $oRegUser->hash;

                    $mail = new PHPMailer();

                    $mail->SMTPAuth = true;

                    //Настройки скорее для Open Server, т.к. он их перекрывает своими настройками почты
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
                    $mail->Username = 'mytech.shop123@gmail.com';
                    $mail->Password = 'diplomdiplom';
                    $mail->setFrom('mytech.shop123@gmail.com');
                    /*-------------------------*/

                    $mail->addAddress($sEmail);

                    $mail->isHTML(true);
                    $mail->Subject = 'Письмо активации';
                    $mail->Body = 'Для активации аккаунта перейдите по <a href="' . $sPath . '">ссылке</a>';

                    $mail->send();
                } catch (Exception $e) {
                    Route::getPage404();
                    exit;
                }

                $oRegUser->save();

                $oForm->path = '/';
                $oForm->text = 'Письмо активации отправлено на ваш почтовый адрес';
            }
        } else {
            $oForm = new RegForm();
        }

        $this->oContent->content->addItem($oForm);

        $this->oContent->render();
    }

    public function actionConfirm()
    {
        $sHash = $this->getRoutes()[0];

        if (!empty($sHash)) {

            $oRegUser = RegUser::findOne(['hash' => $sHash]);

            if ($oRegUser && $oRegUser->hash == $sHash) {
                $oUser = new ModelUser();

                $oUser->login = $oRegUser->name;
                $oUser->password = $oRegUser->password;
                $oUser->mail = $oRegUser->mail;
                $oUser->type = User::TYPE_USER;

                var_dump($oUser->save());

                $oRegUser->delete();

                $oForm = new Answer();

                $oForm->text = 'Ваш аккаунт активирован';
                $oForm->path = '/';

                $this->oContent->content->addItem($oForm);

                $this->oContent->render();

                return;
            }
        }

        Route::getPage404();
    }

    public function actionLogout()
    {
        User::getUser()->logout();

        Route::redirectOnMain();
    }

    /**
     * @param $sName
     * @return bool
     */
    protected function checkUserExist($sName)
    {
        $oUser = ModelUser::findOne(['login' => $sName]);

        if ($oUser->id) {
            return true;
        }

        return false;
    }

    protected function getHash($sName)
    {
        return hash('md5', $sName + rand());
    }

    protected function getFullPathToConfirm()
    {
        return $_SERVER['HTTP_HOST'] . '/auth/confirm/';
    }

}