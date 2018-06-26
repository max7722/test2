<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 18:32
 */

namespace application\core\view;


class TemplateConfig
{
    private static $oInstance;

    //todo наверное лучше перенести в сами вьюхи
    const GOODS_DEFAULT_IMAGE = self::WEB_FOLDER . '/images/default-goods.png';
    const CATEGORY_DEFAULT_IMAGE = self::WEB_FOLDER . '/images/default-category.jpg';

    //для codebase
    const ASSETS_FOLDER = '/lib/codebase/assets';

    const WEB_FOLDER = '/web';

    //для codebase
    public $assets_folder;

    public $sWebFolder;

    public $sMainPath;

    protected $aJsList = [];

    public static function getTemplateConfig()
    {
        if (!self::$oInstance) {
            self::$oInstance = new TemplateConfig();
            self::$oInstance->sMainPath = 'http://' . $_SERVER['HTTP_HOST'];
            self::$oInstance->sWebFolder = self::WEB_FOLDER;
            self::$oInstance->assets_folder = self::$oInstance->sMainPath . self::ASSETS_FOLDER;
        }

        return self::$oInstance;
    }

    public static function getMainPath()
    {
        return self::getTemplateConfig()->sMainPath;
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