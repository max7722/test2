<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 09.05.2018
 * Time: 21:19
 */

namespace application\core\model;

use application\models\User as ModelUser;

class User
{
    const TYPE_ADMIN = 1;

    const TYPE_USER = 2;

    /** @var ModelUser */
    protected $oUser;

    private static $oInstance;

    public static function getUser()
    {
        if (empty(self::$oInstance)) {
            $oFromSession = self::getSessionUser();
            if ($oFromSession) {
                self::$oInstance = $oFromSession;
            } else {
                self::$oInstance = new self();
            }
        }

        return self::$oInstance;
    }

    protected static function getSessionUser()
    {
        if (!empty($_SESSION['user'])) {
            return unserialize($_SESSION['user']);
        }

        return false;
    }

    /**
     * @return bool
     */
    public static function isLogin()
    {
        if (empty(self::getUser()->oUser)) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public static function isAdmin()
    {
        if (self::isLogin()) {
            if (!empty(self::getUser()->oUser->type == self::TYPE_ADMIN)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $sUserLogin
     * @param $sPass
     * @param array $aParams
     * @return bool
     */
    public function newUser($sUserLogin, $sPass, $aParams=[])
    {
        if (ModelUser::findOne(['login' => $sUserLogin])) {
            return false;
        }

        $oUser = new ModelUser();

        $oUser->login = $sUserLogin;
        $oUser->password = $sPass;

        if (!empty($aParams)) {
            foreach ($aParams as $sName => $sValue) {
                $oUser->$sName = $sValue;
            }
        }

        if (!$oUser->save()) {
            return false;
        }

        $this->oUser = $oUser;

        return true;
    }

    /**
     * @param $sUserLogin
     * @param $sPass
     * @return bool
     */
    public function login($sUserLogin, $sPass)
    {
        if (empty($sUserLogin) || empty($sPass)) {
            return false;
        }

        $oUser = ModelUser::findOne(['login' => $sUserLogin]);

        if (!$oUser) {
            return false;
        }

        if ($sPass != $oUser->password) {
            return false;
        }

        $this->oUser = $oUser;
        $this->setSessionUser();

        return true;
    }

    public function logout()
    {
        unset($this->oUser);
        $this->setSessionUser();
    }

    /**
     * @return ModelUser
     */
    public function getModel()
    {
        return $this->oUser;
    }

    public function setSessionUser()
    {
        $_SESSION['user'] = serialize($this);

        return $this;
    }
}