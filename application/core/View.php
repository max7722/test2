<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 21:44
 */

namespace application\core;

use application\core\view\CodebaseConfig;


/**
 * Class view
 * @package application\core
 */
abstract class View
{
    /** @var string  */
    protected $template = '';

    /** @var array  */
    protected $aParams = [];

    /** @var string[]  */
    protected $aJsList = [];

    public function __construct($sTemplate = '')
    {
        if ($sTemplate) {
            $this->template = $sTemplate;
        }

        $this->init();
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        $sFuncName = 'get' . ucfirst($name);
        if (method_exists($this, $sFuncName)) {
            return $this->$sFuncName();
        }

        if (key_exists($name, $this->aParams)) {
            return $this->aParams[$name];
        }

        return null;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $sFuncName = 'set' . ucfirst($name);
        if (method_exists($this, $sFuncName)) {
            $this->$sFuncName($value);
        }

//        if (in_array($name, $this->aParams)) {
//            $this->aParams[$name] = $value;
//        }
    }

    /**
     * @return mixed
     */
    abstract protected function init();

    public function initRender()
    {
        //точно здесь?
        $oTemplate = CodebaseConfig::getTemplateConfig();
        $oTemplate->addJs($this->aJsList);

        $this->aParams['cb'] = $oTemplate;
    }

    public function render() {
        $this->initRender();

        foreach ($this->aParams as $paramName => $paramValue) {
            $$paramName = $paramValue;
        }

        include 'application\views\\' . $this->template;
    }

    public function getTemplate() {
        return $this->template;
    }

    public function setTemplate($value) {
        $this->template = $value;
    }


}