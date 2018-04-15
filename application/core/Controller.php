<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 14:16
 */

namespace application\core;


class Controller
{
    public $oModel;

    /** @var Body */
    public $oContent;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->oContent = new Body();

        $oLeftMenu = new LeftMenu();
        $oHeadMenu = new HeadMenu();
        $oFooter = new Footer();
        $oContent = new Content();

        $oHeadMenuItem = new HeadMenuItem();
        $oHeadMenuItem->href = '12';
        $oHeadMenuItem->title = 12;
        $oHeadMenu->addItems($oHeadMenuItem);

        $oHeadMenuItem = new HeadMenuItem();
        $oHeadMenuItem->href = '34';
        $oHeadMenuItem->title = 34;
        $oHeadMenu->addItems($oHeadMenuItem);


        $this->oContent->header->addItems($oHeadMenu);
        $this->oContent->leftMenu->addItems($oLeftMenu);
        $this->oContent->content->addItems($oContent);
        $this->oContent->footer->addItems($oFooter);

    }

    public function actionIndex()
    {

    }
}