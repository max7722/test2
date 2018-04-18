<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 14:16
 */

namespace application\core;

use application\core\view;

class Controller
{
    public $oModel;

    /** @var view\Body */
    public $oContent;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->oContent = new view\Body();

        $oLeftMenu = new view\LeftMenu();
        $oHeadMenu = new view\HeadMenu();
        $oFooter = new view\Footer();
        $oContent = new view\Content();

        $oHeadMenuItem = new view\HeadMenuItem();
        $oHeadMenuItem->href = '12';
        $oHeadMenuItem->title = 12;
        $oHeadMenu->addItem($oHeadMenuItem);

        $oHeadMenuItem = new view\HeadMenuItem();
        $oHeadMenuItem->href = '34';
        $oHeadMenuItem->title = 34;
        $oHeadMenu->addItem($oHeadMenuItem);


        $this->oContent->header->addItem($oHeadMenu);
        $this->oContent->leftMenu->addItem($oLeftMenu);
        $this->oContent->content->addItem($oContent);
        $this->oContent->footer->addItem($oFooter);
    }

    public function actionIndex()
    {

    }
}