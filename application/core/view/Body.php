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
 */
class Body extends View
{
    protected $template = 'body.php';

    function init()
    {
        $this->aParams['header'] = new ContentBlock('header.php');
        $this->aParams['leftMenu'] = new ContentBlock('leftMenu.php');
        $this->aParams['content'] = new ContentBlock('content.php');
//        $this->aParams['rightMenu'] = new ContentBlock();//?
        $this->aParams['footer'] = new ContentBlock('footer.php');
    }

}