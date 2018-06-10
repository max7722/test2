<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 10.06.2018
 * Time: 11:58
 */

namespace application\core;


use application\core\view\Footer\Footer;
use application\core\view\TemplateConfig;
use application\models\Category;

class AdminController extends BaseController
{
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
        $oFooter = $this->getFooter();

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
            $oCategorySidebarView->path = TemplateConfig::getMainPath() . '/catalog/category/' . $oCategory->id;
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

    private function getFooter()
    {
        return new Footer();
    }
}