<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 10.06.2018
 * Time: 11:58
 */

namespace application\core;


use application\core\view\Footer\Footer;
use application\core\view\Sidebar\MenuItem;
use application\core\view\TemplateConfig;
use application\models\Category;

/**
 * Class AdminController
 * @package application\core
 */
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

    /**
     * @return view\Sidebar\SidebarView
     */
    private function getSidebar()
    {
        $oSidebar = new view\Sidebar\SidebarView();

        $oSidebar->head->path = 'http://' . $_SERVER['HTTP_HOST'];
        $oSidebar->head->firstHalfTitle = 'Быт';
        $oSidebar->head->secondHalfTitle = 'Тех';

        $oGoodsView = new MenuItem();
        $oGoodsView->title = 'Товары';
        $oGoodsView->path = '/admin/goods';

        $oCategoryView = new MenuItem();
        $oCategoryView->title = 'Категории';
        $oCategoryView->path = '/admin/category';

        $oOrderView = new MenuItem();
        $oOrderView->title = 'Заказы';
        $oOrderView->path = '/admin/order';

        $oUserView = new MenuItem();
        $oUserView->title = 'Пользователи';
        $oUserView->path = '/admin/user';

        $oSidebar->menu->addItem($oGoodsView);
        $oSidebar->menu->addItem($oCategoryView);
        $oSidebar->menu->addItem($oOrderView);
        $oSidebar->menu->addItem($oUserView);

        return $oSidebar;
    }

    /**
     * @return view\Header\HeaderView
     */
    private function getHeader()
    {
        $oHeaderView = new view\Header\HeaderView();

        $oButtonSidebar = new view\Header\SidebarButton();
        $oHeaderView->addItem($oButtonSidebar);

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