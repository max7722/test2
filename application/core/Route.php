<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 15:04
 */

namespace application\core;

class Route
{
    private static $sControllerName = 'Main';
    private static $sActionName = 'Index';
    private static $sActionPrefix = 'action';
    private static $sAjaxPrefix = 'ajax';
    private static $sPathController = 'application\controllers\\';

    private static $sController404 = 'Controller404';

    public static function Start()
    {
        session_start();

        if (!empty($_POST['ajax'])) {
            self::startAjax();
            exit;
        }

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        //отсекаем первый пустой елемент
        array_shift($routes);

        $sController = array_shift($routes);
        if (!empty($sController)) {
            self::$sControllerName = ucfirst($sController);
        }

        $sAction = array_shift($routes);
        if (!empty($sAction)) {
            self::$sActionName = ucfirst($sAction);
        }

        $sFullControllerName = self::$sPathController . self::$sControllerName;
        $sFullActionName = self::$sActionPrefix . self::$sActionName;

        if (class_exists($sFullControllerName) && method_exists($sFullControllerName, $sFullActionName)) {
            /** @var Controller $oController */
            $oController = new $sFullControllerName();
            $oController->setPostData($_POST);
            $oController->setRoutes($routes);

            $oController->$sFullActionName();

            return;
        }

        self::getPage404();
    }

    public static function getPage404()
    {
        $sFullControllerName = self::$sPathController . self::$sController404;

        /** @var Controller $oController */
        $oController = new $sFullControllerName();
        $oController->actionIndex();
    }

    public static function startAjax()
    {
        $sController = '';
        $sComand = '';
        $aData = [];

        if (!empty($_POST['controller'])) {
            $sController = $_POST['controller'];
        }

        if (!empty($_POST['cmd'])) {
            $sComand = $_POST['cmd'];
        }

        if (!empty($_POST['data'])) {
            $aData = $_POST['data'];
        }

        $sFullControllerName = self::$sPathController . $sController;
        $sFullAjaxName = self::$sAjaxPrefix . $sComand;

        if (class_exists($sFullControllerName) && method_exists($sFullControllerName, $sFullAjaxName)) {
            /** @var Controller $oController */
            $oController = new $sFullControllerName();
            $oController->setPostData($aData);

            $oController->$sFullAjaxName();
        }
    }

    public static function redirectOnMain()
    {
        header('Location: /');
        exit;
    }
}