<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 31.05.2018
 * Time: 22:01
 */

namespace application\core\view\Auth;


use application\core\View;
use application\core\view\TemplateConfig;

/**
 * Class RegForm
 * @package application\core\view\Auth
 * @property string name
 * @property string password
 * @property string retryPassword
 * @property string email
 * @property bool agreed
 * @property bool error
 */
class RegForm extends View
{
    protected $template = 'auth/regForm.php';

    protected $aJsList = [
        TemplateConfig::ASSETS_FOLDER . '/js/plugins/jquery-validation/jquery.validate.min.js',
        TemplateConfig::ASSETS_FOLDER . '/js/pages/be_forms_validation.js',
    ];

    protected function init()
    {
        $this->aParams['name'] = '';
        $this->aParams['password'] = '';
        $this->aParams['retryPassword'] = '';
        $this->aParams['email'] = '';
        $this->aParams['agreed'] = '';
        $this->aParams['error'] = 0;
    }

    protected function setName($value)
    {
        $this->aParams['name'] = $value;
    }

    protected function setPassword($value)
    {
        $this->aParams['password'] = $value;
    }

    protected function setRetryPassword($value)
    {
        $this->aParams['retryPassword'] = $value;
    }

    protected function setEmail($value)
    {
        $this->aParams['email'] = $value;
    }

    protected function setAgreed($value)
    {
        $this->aParams['agreed'] = $value;
    }

    protected function setError($value)
    {
        $this->aParams['error'] = $value;
    }
}