<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.04.2018
 * Time: 21:50
 */

namespace application\controllers;


use application\core\Controller;
use application\core\Route;
use application\core\view\Catalog\GoodsCategory;
use application\core\view\Catalog\GoodsTable;
use application\core\view\Catalog\GoodsTableRow;
use application\core\view\GoodsDetail;
use application\core\view\PaginationView;
use application\models\Category;
use application\models\Goods;

class Catalog extends Controller
{
    public function actionIndex()
    {
        $this->oContent->render();
    }

    public function actionGoods($aParam = [])
    {
        if (count($aParam) !== 1) {
            Route::getPage404();
            exit;
        }

        $id = array_shift($aParam);
        if (!is_numeric($id) || $id <= 0) {
            Route::getPage404();
            exit;
        }

        $oGoods = Goods::findOne($id);

        if (!$oGoods) {
            Route::getPage404();
            exit;
        }

        $oGoodsView = new GoodsDetail();
        $oGoodsView->goods = $oGoods;

        $this->oContent->content->addItem($oGoodsView);

        $this->oContent->render();
    }

    public function actionCategory($aParam = [])
    {
        $iCountOnPage = 10;

        if (count($aParam) > 2) {
            Route::getPage404();
            exit;
        }

        $id = array_shift($aParam);
        $iPage = array_shift($aParam);

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

        $oCategory = Category::findOne($id);

        if (!$oCategory) {
            Route::getPage404();
            exit;
        }

        $oGoodsTableView = new GoodsTable();
        $oGoodsRowView = new GoodsTableRow();
        $goods = array_slice($oCategory->goods, $iPage  * $iCountOnPage, $iCountOnPage);
        $oGoodsRowView->addGoods($goods);
        $oGoodsTableView->goodsRowView = $oGoodsRowView;

        $oPagination = new PaginationView();
        $oPagination->count = intval(count($oCategory->goods) / $iCountOnPage);
        $oPagination->active = $iPage;
        $oPagination->catalog = $id;

        $oGoodsCategoryView = new GoodsCategory();
        $oGoodsCategoryView->category = $oCategory;
        $oGoodsCategoryView->addView($oGoodsTableView);
        $oGoodsCategoryView->addView($oPagination);

        $this->oContent->content->addItem($oGoodsCategoryView);

        $this->oContent->render();
    }
}