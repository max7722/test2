<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06.05.2018
 * Time: 19:06
 */

namespace application\core\view;


use application\core\View;

class Head extends View
{
    protected $template = 'head.php';

    protected $css = [
//        CodebaseConfig::ASSETS_FOLDER . '/css/codebase.min.css',
        CodebaseConfig::ASSETS_FOLDER . '/js/plugins/magnific-popup/magnific-popup.min.css',
    ];

    protected function init()
    {
        $this->aParams['title'] = 'Title';
        $this->aParams['favicon'] = '';
        $this->aParams['cssList'] = $this->css;
    }
}