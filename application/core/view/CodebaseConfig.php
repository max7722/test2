<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 18:32
 */

namespace application\core\view;


class CodebaseConfig
{
    private static $oInstance;

    //для codebase
    const ASSETS_FOLDER = '/lib/codebase/assets';

    const WEB_FOLDER = '/web';

    //для codebase
    public $assets_folder;

    public $sWebFolder = '/web';

    public $sMainPath;

    protected $aJsList = [];

    public static function getTemplateConfig()
    {
        if (!self::$oInstance) {
            self::$oInstance = new CodebaseConfig();
            self::$oInstance->sMainPath = 'http://' . $_SERVER['HTTP_HOST'];
            self::$oInstance->assets_folder = self::$oInstance->sMainPath . self::ASSETS_FOLDER;
        }

        return self::$oInstance;
    }

    private function __construct()
    {
    }

    /**
     * @param string|string[] $sPath
     */
    public function addJs($mPath)
    {
        if (is_array($mPath)) {
            $this->aJsList = array_merge($this->aJsList, $mPath);
            return;
        }

        $this->aJsList[] = $mPath;
    }

    /**
     * @return string[]
     */
    public function getJs()
    {
        return $this->aJsList;
    }
}