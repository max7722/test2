<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 15:04
 */

namespace application\core;

use application\controllers;

class Route
{
    static private $sControllerName = 'Main';
    static private $sActionName = 'Index';
    static private $sActionPrefix = 'action';
    static private $sPathController = 'application\controllers\\';

    static private $sController404 = 'Controller404';

    static public function Start()
    {

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        $sController = array_shift($routes);
        if ( !empty($sController) )
        {
            self::$sControllerName = ucfirst($sController);
        }

        $sAction = array_shift($routes);
        if ( !empty($sAction) )
        {
            self::$sActionName = ucfirst($sAction);
        }

        $sFullControllerName = self::$sPathController . self::$sControllerName;
        $sFullActionName = self::$sActionPrefix . self::$sActionName;

        if (class_exists($sFullControllerName) && method_exists($sFullControllerName, $sFullActionName)) {
            $oController = new $sFullControllerName();
            $oController->$sFullActionName();
        } else {
            $sFullControllerName = self::$sPathController . self::$sController404;

            $oController = new $sFullControllerName();
            $oController->actionIndex();
        }
    }
}