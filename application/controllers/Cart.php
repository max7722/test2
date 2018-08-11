<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 07.05.2018
 * Time: 22:06
 */

namespace application\controllers;


use application\core\model\User;
use application\core\PageController;
use application\core\model\Cart as ModelCart;
use application\core\view\Cart\CartView;
use application\core\view\Cart\Form;
use application\core\view\Cart\GoodsRow;
use application\core\view\FormConfirm;
use application\models\Delivery;
use application\models\Goods;
use application\models\Order;

/**
 * Class Cart
 * @package application\controllers
 */
class Cart extends PageController
{
    public function actionIndex()
    {
        $this->oContent->head->title = 'Корзина';

        $oCartView = new CartView();
        $oCartView->title = 'Корзина';
        $oCartView->viewRow = new GoodsRow();

        $this->oContent->content->addItem($oCartView);

        $this->oContent->render();
    }

    public function actionCheckout()
    {
        $this->oContent->head->title = 'Форма заказа';

        $oForm = new Form();

        $aDelivery = Delivery::findAll();

        $oForm->addDelivery($aDelivery);

        $this->oContent->content->addItem($oForm);
        $this->oContent->render();
    }

    public function actionConfirm()
    {

        $this->oContent->head->title = 'Заказ прошел успешно';

        $aPost = $this->getPostData();

        if (empty($aPost['val-confirm'])) {
            return;//todo
        }

        $oCart = ModelCart::getCart();

        $oOrder = new Order();
        $oOrder->price = $oCart->getAllPrice();
        $oOrder->type_delivery = $aPost['val-delivery'];
        $oOrder->address = $aPost['val-email'];
        $oOrder->datetime = date("Y-m-d H:i:s");
        $oOrder->status = 0;
        $oOrder->id_user = 0;
        if (User::isLogin()) {
            $oOrder->id_user = User::getUser()->getModel()->id;
        }

        $oOrder->phone = '';//todo

        var_dump($oOrder->save());

        $oCart->saveCart($oOrder->id);
        $oCart->removeAllItems();
        $oCart->setSessionCart();

        $oConfirm = new FormConfirm();

        $this->oContent->content->addItem($oConfirm);
        $this->oContent->render();
    }

    public function ajaxAppendGoods()
    {
        $aParam = $this->getPostData();
        $oCart = ModelCart::getCart();

        $oGoods = Goods::findOne($aParam['id']);

        if (empty($oGoods)) {
            return;
        }

        $oCart->addItem($oGoods, $aParam['count']);
        $oCart->setSessionCart();

        echo json_encode([
            'count' => $oCart->getCount(),
            'price' => $oCart->getAllPrice(),
        ]);
    }

    public function ajaxReset()
    {
        $oCart = ModelCart::getCart()
            ->removeAllItems()
            ->setSessionCart();

        echo json_encode([
            'complete' => true
        ]);
    }
}