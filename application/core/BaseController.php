<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 10.06.2018
 * Time: 11:58
 */

namespace application\core;

/**
 * Class BaseController
 * @package application\core
 */
class BaseController
{
    /** @var view\Body */
    public $oContent;

    private $aPostData = [];

    private $aRoutes = [];

    /**
     * @param string $sVal
     * @return array|mixed
     */
    final protected function getPostData($sVal = '')
    {
        if ($sVal) {
            if (isset($this->aPostData[$sVal])) {
                return $this->aPostData[$sVal];
            }

            return false;
        }

        return $this->aPostData;
    }

    /**
     * @param $aData
     */
    final public function setPostData($aData)
    {
        $this->aPostData = $aData;
    }

    /**
     * @param $aRoutes
     */
    final public function setRoutes($aRoutes)
    {
        $this->aRoutes = $aRoutes;
    }

    /**
     * @return array
     */
    final protected function getRoutes()
    {
        return $this->aRoutes;
    }
}