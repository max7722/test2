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
use application\core\view\GoodsDetail;
use application\core\view\GoodsList;
use application\models\Category;
use application\models\Goods;

class Catalog extends Controller
{
    public function actionIndex()
    {
        $aGoods = Goods::findAll();
        $oCategory = Category::findOne(['id' => 1]);
        $oGoodsListView = new GoodsList();
        $oGoodsListView->addGoods($aGoods);
        $oGoodsListView->category = $oCategory;

        $this->oContent->content->addItem($oGoodsListView);

        $this->oContent->render();
    }

    public function actionGoods($id = 0)
    {
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

    public function actionCategory($id = 0)
    {
        if (!is_numeric($id) || $id <= 0) {
            Route::getPage404();
            exit;
        }

        $oCategory = Category::findOne($id);

        if (!$oCategory) {
            Route::getPage404();
            exit;
        }

        $oGoodsListView = new GoodsList();
        $oGoodsListView->addGoods($oCategory->goods);

        $this->oContent->content->addItem($oGoodsListView);

        $this->oContent->render();
    }
}