<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 31.05.2018
 * Time: 21:58
 */

namespace application\core\view\Auth;


use application\core\View;
use application\core\view\TemplateConfig;

/**
 * Class AuthForm
 * @package application\core\view\Auth
 * @property string name
 * @property string password
 * @property bool error
 */
class AuthForm extends View
{
    protected $template = 'auth/authForm.php';

    protected $aJsList = [
        TemplateConfig::ASSETS_FOLDER . '/js/plugins/jquery-validation/jquery.validate.min.js',
        TemplateConfig::ASSETS_FOLDER . '/js/pages/be_forms_validation.js',
    ];

    protected function init()
    {
        $this->aParams['name'] = '';
        $this->aParams['password'] = '';
        $this->aParams['error'] = false;
    }

    /**
     * @param $value
     */
    protected function setName($value)
    {
        $this->aParams['name'] = $value;
    }

    /**
     * @param $value
     */
    protected function setPassword($value)
    {
        $this->aParams['password'] = $value;
    }

    /**
     * @param $value
     */
    protected function setError($value)
    {
        $this->aParams['error'] = (bool)$value;
    }
}