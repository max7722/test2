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
use application\core\view\Category\CategoryEdit;
use application\core\view\Category\CategoryList;
use application\core\view\Category\GoodsList;
use application\core\view\PaginationView;
use application\models\CategoryGoods;

/**
 * Class Category
 * @package application\controllers\admin
 */
class Category extends AdminController
{
    public function actionIndex()
    {
        $this->oContent->head->title = 'Список категорий';

        $this->actionList();
    }

    public function actionList()
    {
        $this->oContent->head->title = 'Список категорий';

        $aRoutes = $this->getRoutes();
        $iCountOnPage = 10;

        if (count($aRoutes) > 1) {
            Route::getPage404();
            exit;
        }

        $iPage = array_shift($aRoutes);

        if (empty($iPage)) {
            $iPage = 1;
        }

        if (!is_numeric($iPage) || $iPage < 0) {
            Route::getPage404();
            exit;
        }

        $aCategory = \application\models\Category::findAll();

        $oCategyList = new CategoryList();

        $oCategyList->categories = $aCategory;

        $oPagination = new PaginationView();
        $oPagination->count = intval(count($aCategory) / $iCountOnPage);
        $oPagination->active = $iPage;
        $oPagination->path = '/admin/goods/list/';

        $this->oContent->content->addItem($oCategyList);
        $this->oContent->content->addItem($oPagination);

        $this->oContent->render();
    }

    public function actionShow()
    {
        $this->oContent->head->title = 'Редактор категории';

        $aRoute = $this->getRoutes();
        $idCategory = array_shift($aRoute);

        if ($aRoute) {
            Route::getPage404();
            exit;
        }

//        if (isset($idCategory) && !is_numeric($idCategory)) {
//            Route::getPage404();
//            exit;
//        }

        if ($idCategory) {
            $oCategory = \application\models\Category::findOne($idCategory);
        } else {
            if (!empty($idCategory)) {
                Route::getPage404();
                exit;
            }
            $oCategory = new \application\models\Category();
        }
        if (!$oCategory) {
            Route::getPage404();
            exit;
        }

        $aData = $this->getPostData();
        if (!empty($aData)) {
            if (!empty($aData['delete'])) {
                $oCategory->delete();
                header('Location: /admin/category/list');
                return;
            }

            $oCategory->name = $aData['name'];
            $oCategory->description = $aData['js-ckeditor'];

            $oCategory->active = 0;
            if (!empty($aData['active'])) {
                $oCategory->active = 1;
            }

            $oCategory->save();
        }

        $oCategoryEdit = new CategoryEdit();

        $oCategoryEdit->category = $oCategory;

        $this->oContent->content->addItem($oCategoryEdit);

        $this->oContent->render();
    }

    public function actionGoods()
    {
        $this->oContent->head->title = 'Список товаров';

        $aRoutes = $this->getRoutes();

        if (count($aRoutes) > 3) {
            Route::getPage404();
            exit;
        }

        $id = array_shift($aRoutes);

        if (count($aRoutes) == 2) {
            if (!$aRoutes[1] == 'delete') {
                Route::getPage404();
                exit;
            }

            $idGoods = array_shift($aRoutes);

            $oGoodsRelation = CategoryGoods::findOne(['id_category' => $id, 'id_goods' => $idGoods]);

            if ($oGoodsRelation->delete()) {
                header('Location: /admin/category/goods/' . $id);
                exit;
            }

            Route::getPage404();
            exit;
        }

        $iPage = array_shift($aRoutes);

        if (!is_numeric($id) || $id <= 0) {
            Route::getPage404();
            exit;
        }

        if (empty($iPage)) {
            $iPage = 1;
        }

        if (!is_numeric($iPage) || $iPage < 0) {
            Route::getPage404();
            exit;
        }

        $oCategory = \application\models\Category::findOne($id);

        if (!$oCategory) {
            Route::getPage404();
            exit;
        }

        $oGoodsList = new GoodsList();

        $oGoodsList->category = $oCategory;

        $this->oContent->content->addItem($oGoodsList);

        $this->oContent->render();
    }

    public function actionSave()
    {
        $aFile = $_FILES['image'];
        $idGoods = $this->getPostData('id');
        $oCategory = \application\models\Category::findOne($idGoods);

        if (!empty($aFile['name'])) {

            $sPath = $aFile["tmp_name"];
            $name = basename($aFile["name"]);
            $sPathUpload = 'web/images/category/' . $idGoods . $name;
            move_uploaded_file($sPath, $sPathUpload);

            $oCategory->image = $sPathUpload;
            $oCategory->save();
        }

        header('Location: /admin/category/show/' . $oCategory->id);
        exit;
    }

    public function actionEditgoods()
    {
        $this->oContent->head->title = 'Список всех товаров';

        $aRoutes = $this->getRoutes();

        if (count($aRoutes) > 3) {
            Route::getPage404();
            exit;
        }

        $id = array_shift($aRoutes);

        if (count($aRoutes) == 2) {
            if (!$aRoutes[1] == 'add') {
                Route::getPage404();
                exit;
            }

            $idGoods = array_shift($aRoutes);

            $oGoodsRelation = new CategoryGoods;

            $oGoodsRelation->id_goods = $idGoods;
            $oGoodsRelation->id_category = $id;

            if ($oGoodsRelation->save()) {
                header('Location: /admin/category/editgoods/' . $id);
                exit;
            }

            Route::getPage404();
            exit;
        }

        $iPage = array_shift($aRoutes);

        if (!is_numeric($id) || $id <= 0) {
            Route::getPage404();
            exit;
        }

        if (empty($iPage)) {
            $iPage = 1;
        }

        if (!is_numeric($iPage) || $iPage < 0) {
            Route::getPage404();
            exit;
        }

        $oCategory = \application\models\Category::findOne($id);

        if (!$oCategory) {
            Route::getPage404();
            exit;
        }

        $oGoodsList = new GoodsList();

        $oGoodsList->category = $oCategory;
        $oGoodsList->setTemplate('category/goodsListAdd.php');

        $this->oContent->content->addItem($oGoodsList);

        $this->oContent->render();
    }
}