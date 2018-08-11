<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 14:16
 */

namespace application\core;

use application\core\view\Footer\Footer;
use application\core\view\Sidebar\MenuItem;
use application\core\view\TemplateConfig;
use application\models\Category;

/**
 * Class PageController
 * @package application\core
 */
class PageController extends BaseController
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

    /**
     * @return view\Sidebar\SidebarView
     */
    private function getSidebar()
    {
        $oSidebar = new view\Sidebar\SidebarView();
        
        $oSidebar->head->path = 'http://' . $_SERVER['HTTP_HOST'];
        $oSidebar->head->firstHalfTitle = 'Быт';
        $oSidebar->head->secondHalfTitle = 'Тех';
        
        $oGoodsSidebarView = new view\Sidebar\SubMenuView();
        $oGoodsSidebarView->title = 'Товары';
        
        $aCategores = Category::findAll(['active' => 1]);
        foreach ($aCategores as $oCategory) {
            $oCategorySidebarView = new view\Sidebar\MenuItem();
            $oCategorySidebarView->title = $oCategory->name;
            $oCategorySidebarView->path = TemplateConfig::getMainPath() . '/catalog/category/' . $oCategory->id;
            $oGoodsSidebarView->addItem($oCategorySidebarView);
        }

        $oAbout = new MenuItem();
        $oAbout->title = 'О компании';
        $oAbout->path = '/about';

        $oSidebar->menu->addItem($oGoodsSidebarView);
        $oSidebar->menu->addItem($oAbout);

        return $oSidebar;
    }

    /**
     * @return view\Header\HeaderView
     */
    private function getHeader()
    {
        $oHeaderView = new view\Header\HeaderView();
        $oCart = new view\Header\CartView();
        $oButtonSidebar = new view\Header\SidebarButton();

        $oHeaderView->addItem($oButtonSidebar);
        $oHeaderView->addItem($oCart);

        return $oHeaderView;
    }

    /**
     * @return Footer
     */
    private function getFooter()
    {
        return new Footer();
    }
}