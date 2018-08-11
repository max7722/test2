<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 10.06.2018
 * Time: 11:55
 */

namespace application\controllers\admin;


use application\core\AdminController;
use application\core\Route;
use application\core\view\Catalog\GoodsTable;
use application\core\view\Catalog\GoodsTableRow;
use application\core\view\Goods\GoodsEdit;
use application\core\view\PaginationView;

/**
 * Class Goods
 * @package application\controllers\admin
 */
class Goods extends AdminController
{
    public function actionIndex()
    {
        $this->oContent->head->title = 'Список товаров';

        $this->actionList();
    }

    public function actionList()
    {
        $this->oContent->head->title = 'Список товаров';

        $aRoutes = $this->getRoutes();
        $iCountOnPage = 10;

        if (count($aRoutes) > 1) {
            Route::getPage404();
            exit;
        }

        $iPage = array_shift($aRoutes);

        if (empty($iPage)) {
            $iPage = 0;
        }

        if (!is_numeric($iPage) || $iPage < 0) {
            Route::getPage404();
            exit;
        }

        $aGoods = \application\models\Goods::findAll();

        $oGoodsTableView = new GoodsTable();
        $oGoodsRowView = new GoodsTableRow();
        $goods = array_slice($aGoods, $iPage  * $iCountOnPage, $iCountOnPage);

        $oGoodsRowView->addGoods($goods);
        $oGoodsRowView->setTemplate('goods/goodsList.php');
        $oGoodsTableView->goodsRowView = $oGoodsRowView;
        $oGoodsTableView->setTemplate('goods/goodsListMain.php');


        $oPagination = new PaginationView();
        $oPagination->count = intval(count($aGoods) / $iCountOnPage);
        $oPagination->active = $iPage;
        $oPagination->path = '/admin/goods/list/';

        $this->oContent->content->addItem($oGoodsTableView);
        $this->oContent->content->addItem($oPagination);

        $this->oContent->render();
    }

    public function actionShow()
    {
        $this->oContent->head->title = 'Редактор товара';

        $aRoute = $this->getRoutes();
        $idGoods = array_shift($aRoute);

        if ($aRoute) {
            Route::getPage404();
            exit;
        }

//        if (isset($idGoods) && !is_numeric($idGoods)) {
//            Route::getPage404();
//            exit;
//        }

        if ($idGoods) {
            $oGoods = \application\models\Goods::findOne($idGoods);
        } else {
            if (!empty($idGoods)) {
                Route::getPage404();
                exit;
            }
            $oGoods = new \application\models\Goods();
        }
        if (!$oGoods) {
            Route::getPage404();
            exit;
        }
        $aData = $this->getPostData();
        if (!empty($aData)) {
            if (!empty($aData['delete'])) {
                $oGoods->delete();
                header('Location: /admin/goods/list');
                return;
            }

            $oGoods->name = $aData['name'];
            $oGoods->description = $aData['js-ckeditor'];

            $oGoods->active = 0;
            if (!empty($aData['active'])) {
                $oGoods->active = 1;
            }

            $oGoods->hit = 0;
            if (!empty($aData['hit'])) {
                $oGoods->hit = 1;
            }

            $oGoods->new = 0;
            if (!empty($aData['new'])) {
                $oGoods->new = 1;
            }

            $oGoods->luck = 0;
            if (!empty($aData['luck'])) {
                $oGoods->luck = 1;
            }

            $oGoods->price = $aData['price'];

            $oGoods->save();
        }

        $oEditor = new GoodsEdit();


        $oEditor->goods = $oGoods;

        $this->oContent->content->addItem($oEditor);

        $this->oContent->render();
    }

    public function actionSave()
    {
        $aFile = $_FILES['image'];
        $idGoods = $this->getPostData('id');

        $sPath = $aFile["tmp_name"];
        $name = basename($aFile["name"]);
        $sPathUpload = 'web/images/goods/' . $idGoods . $name;
        move_uploaded_file($sPath, $sPathUpload);

        $oGoods = \application\models\Goods::findOne($idGoods);

        $oGoods->image = $sPathUpload;
        $oGoods->save();

        $oEditor = new GoodsEdit();


        $oEditor->goods = $oGoods;

        $this->oContent->content->addItem($oEditor);

        $this->oContent->render();

        $aFile = $_FILES['image'];
        $idGoods = $this->getPostData('id');
        $oGoods = \application\models\Goods::findOne($idGoods);

        if (!empty($aFile['name'])) {

            $sPath = $aFile["tmp_name"];
            $name = basename($aFile["name"]);
            $sPathUpload = 'web/images/goods/' . $idGoods . $name;
            move_uploaded_file($sPath, $sPathUpload);

            $oGoods->image = $sPathUpload;
            $oGoods->save();
        }

        header('Location: /admin/goods/show/' . $oGoods->id);
        exit;
    }

}