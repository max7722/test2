<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06.05.2018
 * Time: 19:06
 */

namespace application\core\view;


use application\core\View;

/**
 * Class Head
 * @package application\core\view
 * @property string title
 * @property string favicon
 * @property-read array cssList
 */
class Head extends View
{
    protected $template = 'head.php';

    protected $css = [
//        CodebaseConfig::ASSETS_FOLDER . '/css/codebase.min.css',
        TemplateConfig::ASSETS_FOLDER . '/js/plugins/magnific-popup/magnific-popup.min.css',
        TemplateConfig::WEB_FOLDER . '/css/style.css'
    ];

    protected function init()
    {
        $this->aParams['title'] = 'Title';
        $this->aParams['favicon'] = '';
        $this->aParams['cssList'] = $this->css;
    }

    /**
     * @param string $sTitle
     */
    protected function setTitle($sTitle)
    {
        $this->aParams['title'] = $sTitle;
    }

    /**
     * @param array $aListCss
     */
    public function addCss(array $aListCss)
    {
        $this->aParams['cssList'] = array_merge($this->aParams['cssList'], $aListCss);
    }


}