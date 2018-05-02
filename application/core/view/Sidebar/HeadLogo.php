<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 30.04.2018
 * Time: 19:34
 */

namespace application\core\view\Sidebar;


use application\core\View;

/**
 * Class SidebarHeadLogo
 * @package application\core\view\Sidebar
 * @property string firstHalfTitle
 * @property string secondHalfTitle
 * @property string path
 */
class HeadLogo extends View
{
    protected $template = 'sidebar/headLogo.php';

    protected function init()
    {
        $this->aParams['firstHalfTitle'] = '';
        $this->aParams['secondHalfTitle'] = '';
        $this->aParams['path'] = '';
    }

    public function setFirstHalfTitle($sFirstHalfTitle)
    {
        $this->aParams['firstHalfTitle'] = $sFirstHalfTitle;
    }

    public function setSecondHalfTitle($sSecondHalfTitle)
    {
        $this->aParams['secondHalfTitle'] = $sSecondHalfTitle;
    }

    public function setPath($sPath)
    {
        $this->aParams['path'] = $sPath;
    }
}