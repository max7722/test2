<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 14:16
 */

namespace application\core;

use application\models\Category;

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


        $this->oContent->header->setTemplate('head_start.php');
        $this->oContent->footer->setTemplate('footer_start.php');

        $oSidebar = $this->getSidebar();

        $this->oContent->header->addItem($oHeadMenu);
        $this->oContent->leftMenu->addItem($oSidebar);
        $this->oContent->content->addItem($oContent);
        $this->oContent->footer->addItem($oFooter);
    }

    public function actionIndex()
    {

    }
    
    private function getSidebar()
    {
        $oSidebar = new view\Sidebar\SidebarView();
        
        $oSidebar->head->path = 'http://' . $_SERVER['HTTP_HOST'];
        $oSidebar->head->firstHalfTitle = 'Быт';
        $oSidebar->head->secondHalfTitle = 'Тех';
        
        $oGoodsSidebarView = new view\Sidebar\SubMenuView();
        $oGoodsSidebarView->title = 'Товары';
        
        $aCategores = Category::findAll();
        foreach ($aCategores as $oCategory) {
            $oCategorySidebarView = new view\Sidebar\MenuItem();
            $oCategorySidebarView->title = $oCategory->name;
            $oCategorySidebarView->path = 'http://' . $_SERVER['HTTP_HOST'] . '/catalog/category/' . $oCategory->id;
            $oGoodsSidebarView->addItems($oCategorySidebarView);
        }
        
        $oSidebar->menu->addItems($oGoodsSidebarView);

        return $oSidebar;
    }
}