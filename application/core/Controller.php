<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 14:16
 */

namespace application\core;

use application\core\view\CodebaseConfig;
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

        $oFooter = new view\Footer();
        $oContent = new view\Content();

        $oSidebar = $this->getSidebar();
        $oHeader = $this->getHeader();

        $this->oContent->header->addItem($oHeader);
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
            $oCategorySidebarView->path = CodebaseConfig::getTemplateConfig()->sMainPath . '/catalog/category/' . $oCategory->id;
            $oGoodsSidebarView->addItems($oCategorySidebarView);
        }

        $oSidebar->menu->addItems($oGoodsSidebarView);

        return $oSidebar;
    }

    private function getHeader()
    {
        $oHeaderView = new view\Header\HeaderView();

        return $oHeaderView;
    }
}