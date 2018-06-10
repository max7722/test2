<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 05.06.2018
 * Time: 20:11
 */

namespace application\core\view\main;


use application\core\View;
use application\core\view\TemplateConfig;

/**
 * Class MainView
 * @package application\core\view\main
 * @property View hit
 * @property View slider
 * @property View new
 * @property View luck
 */
class MainView extends View
{
    protected $template = 'main/index.php';

    protected $aJsList = [
        TemplateConfig::ASSETS_FOLDER . '/js/plugins/slick/slick.min.js',
        TemplateConfig::WEB_FOLDER . '/js/slider.js'
    ];

    protected function init()
    {
        $this->aParams['hit'] = null;
        $this->aParams['slider'] = null;
        $this->aParams['new'] = null;
        $this->aParams['luck'] = null;
    }

    protected function setHit(View $value)
    {
        $this->aParams['hit'] = $value;
    }

    protected function setSlider(View $value)
    {
        $this->aParams['slider'] = $value;
    }

    protected function setNew(View $value)
    {
        $this->aParams['new'] = $value;
    }

    protected function setLuck(View $value)
    {
        $this->aParams['luck'] = $value;
    }
}