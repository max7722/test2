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
    static private $sControllerName = 'Main';
    static private $sActionName = 'Index';
    static private $sActionPrefix = 'action';
    static private $sPathController = 'application\controllers\\';

    static private $sController404 = 'Controller404';

    static public function Start()
    {

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        //отсекаем первый пустой елемент
        array_shift($routes);

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
            if (!empty($routes)) {
                if (count($routes) === 1) {
                    $oController->$sFullActionName($routes[0]);

                    return;
                }
            } else {
                $oController->$sFullActionName();

                return;
            }
        }

        self::getPage404();
    }

    static public function getPage404()
    {
        $sFullControllerName = self::$sPathController . self::$sController404;

        /** @var Controller $oController */
        $oController = new $sFullControllerName();
        $oController->actionIndex();
    }
}