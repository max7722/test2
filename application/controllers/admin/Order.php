<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 10.06.2018
 * Time: 11:56
 */

namespace application\controllers\admin;


use application\core\AdminController;
use application\core\Route;
use application\core\view\Cart\CartView;
use application\core\view\Cart\GoodsRowAdm;
use application\core\view\Order\OrderList;
use application\core\view\PaginationView;

/**
 * Class Order
 * @package application\controllers\admin
 */
class Order extends AdminController
{
    public function actionIndex()
    {
        $this->oContent->head->title = 'Список закаов';

        $this->actionList();
    }

    public function actionList()
    {
        $this->oContent->head->title = 'Список закаов';

        $aRoute = $this->getRoutes();
        $iPage = array_shift($aRoute);

        if ($aRoute) {
            Route::getPage404();
            exit;
        }

        if (!$iPage) {
            $iPage = 0;
        } elseif (!is_numeric($iPage)) {
            Route::getPage404();
            exit;
        }

        $oView = new OrderList();

        $oOrder = \application\models\Order::findAll(0, 3, $iPage * 3);
        $oView->addOrders($oOrder);

        $oPagination = new PaginationView();
        $oPagination->count = intval(count(\application\models\Order::findAll()) / 3);
        $oPagination->active = $iPage;
        $oPagination->path = '/admin/order/list/';

        $this->oContent->content->addItem($oView);
        $this->oContent->content->addItem($oPagination);

        $this->oContent->render();
    }

    public function actionShow()
    {
        $this->oContent->head->title = 'Редактор заказа';

        $aRoute = $this->getRoutes();
        $idOrder = array_shift($aRoute);

        if ($aRoute) {
            Route::getPage404();
            exit;
        }

        if (!$idOrder) {
            $idOrder = 0;
        } elseif (!is_numeric($idOrder)) {
            Route::getPage404();
            exit;
        }

        $oOrder = \application\models\Order::findOne($idOrder);
        if (!$oOrder) {
            Route::getPage404();
            exit;
        }

        $iChangeStatus = $this->getPostData('select');
        var_dump($iChangeStatus);

        if (!empty($iChangeStatus) || $iChangeStatus === '0') {
            $oOrder->status = (int)$iChangeStatus;
            var_dump($oOrder->save());
        }

        $oCartView = new CartView();
        $oCartView->setTemplate('cart/cartViewAdm.php');
        $oCartView->id = $oOrder->id;
        $oCartView->complete = $oOrder->status;
        $oCartView->title = 'Заказ';
        $oCartView->price = $oOrder->price;

        $oGoodsRow = new GoodsRowAdm();
        $oGoodsRow->orderList = $oOrder->orderList;

        $oCartView->viewRow = $oGoodsRow;

        $this->oContent->content->addItem($oCartView);
        $this->oContent->render();
    }

}