<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 18:32
 */

namespace application\core\view;


use lib\codebase\Template;

class CodebaseConfig
{
    private static $oInstance;

    const ASSETS_FOLDER = '/lib/codebase/assets';

    public static function getTemplateConfig()
    {
        if (!self::$oInstance) {
            self::$oInstance = new Template();

            self::$oInstance->assets_folder = 'http://' . $_SERVER['HTTP_HOST'] . self::ASSETS_FOLDER;
        }

        return self::$oInstance;
    }

    private function __construct()
    {
    }
}