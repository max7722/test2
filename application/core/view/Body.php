<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 22:03
 */

namespace application\core\view;

use application\core\View;

/**
 * Class Body
 * @package application\core
 * @property-read ContentBlock header
 * @property-read ContentBlock leftMenu
 * @property-read ContentBlock content
 * @property-read ContentBlock rightMenu
 * @property-read ContentBlock footer
 * @property-read Head head
 */
class Body extends View
{
    protected $template = 'body.php';

    protected $aJsList = [
        TemplateConfig::ASSETS_FOLDER . '/js/core/jquery.min.js',
        TemplateConfig::ASSETS_FOLDER . '/js/core/bootstrap.bundle.min.js',
        TemplateConfig::ASSETS_FOLDER . '/js/core/jquery.slimscroll.min.js',
        TemplateConfig::ASSETS_FOLDER . '/js/core/jquery.scrollLock.min.js',
        TemplateConfig::ASSETS_FOLDER . '/js/core/jquery.appear.min.js',
        TemplateConfig::ASSETS_FOLDER . '/js/core/jquery.countTo.min.js',
        TemplateConfig::ASSETS_FOLDER . '/js/core/js.cookie.min.js',
        TemplateConfig::ASSETS_FOLDER . '/js/codebase.js',
        TemplateConfig::ASSETS_FOLDER . '/js/plugins/chartjs/Chart.bundle.min.js',
        TemplateConfig::ASSETS_FOLDER . '/js/pages/be_pages_dashboard.js',
    ];

    function init()
    {
        $this->aParams['head'] = new Head();
        $this->aParams['header'] = new ContentBlock('header.php');
        $this->aParams['leftMenu'] = new ContentBlock('leftMenu.php');
        $this->aParams['content'] = new ContentBlock('content.php');
//        $this->aParams['rightMenu'] = new ContentBlock();//?
        $this->aParams['footer'] = new ContentBlock('footer.php');
    }

}