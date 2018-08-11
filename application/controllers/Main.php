<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 15.04.2018
 * Time: 14:16
 */

namespace application\controllers;


use application\core\PageController;
use application\core\view\Gallery\GoodstList;
use application\core\view\Gallery\ImageList;
use application\core\view\Gallery\Slider;
use application\core\view\GoodsListRow;
use application\core\view\Main\MainView;
use application\core\view\TemplateConfig;
use application\models\Goods;

class Main extends PageController
{
    public function actionIndex() {
        $this->oContent->head->title = 'Главная';

        $oMainView = new MainView();

        $oMainView->slider = $this->getMainSlider();
        $oMainView->hit = $this->getSliderHit();
        $oMainView->new = $this->getSliderNew();
        $oMainView->luck = $this->getSliderLuck();

        $this->oContent->content->addItem($oMainView);

        $this->oContent->head->addCss([
            TemplateConfig::ASSETS_FOLDER . '/js/plugins/slick/slick.min.css',
            TemplateConfig::ASSETS_FOLDER . '/js/plugins/slick/slick-theme.min.css'
        ]);

        $this->oContent->render();
    }

    /**
     * @return Slider
     */
    private function getMainSlider()
    {
        $oSlider = new Slider();
        $oSlider->setTemplate(Slider::TMP_SLIDER);

        $oImageList = new ImageList();
        $oImageList->addImage([
            TemplateConfig::WEB_FOLDER . '/images/slider/2.jpg',
            TemplateConfig::WEB_FOLDER . '/images/slider/3.jpg',
            TemplateConfig::WEB_FOLDER . '/images/slider/1.jpg',
            TemplateConfig::WEB_FOLDER . '/images/slider/4.jpg',
        ]);

        $oSlider->view = $oImageList;

        return $oSlider;
    }

    /**
     * @return Slider
     */
    private function getSliderHit()
    {
        $aGoodsHit = Goods::findAll(['active' => 1, 'hit' => 1]);

        $oGoodslist = new GoodstList();
        $oGoodslist->addGoods($aGoodsHit);

        $oSliderForHit = new Slider();
        $oSliderForHit->setTemplate(Slider::TMP_CAROUSEL);
        $oSliderForHit->view = $oGoodslist;
        $oSliderForHit->multiple = 1;
        $oSliderForHit->title = 'Хит продаж';

        return $oSliderForHit;
    }

    /**
     * @return Slider
     */
    private function getSliderNew()
    {
        $aGoodsNew = Goods::findAll(['active' => 1, 'new' => 1]);

        $oGoodslist = new GoodstList();
        $oGoodslist->addGoods($aGoodsNew);

        $oSlider = new Slider();
        $oSlider->setTemplate(Slider::TMP_CAROUSEL);
        $oSlider->view = $oGoodslist;
        $oSlider->multiple = 1;
        $oSlider->title = 'Новые товары';

        return $oSlider;
    }

    /**
     * @return Slider
     */
    private function getSliderLuck()
    {
        $aGoods = Goods::findAll(['active' => 1, 'luck' => 1]);

        $oGoodslist = new GoodstList();
        $oGoodslist->addGoods($aGoods);

        $oSlider = new Slider();
        $oSlider->setTemplate(Slider::TMP_CAROUSEL);
        $oSlider->view = $oGoodslist;
        $oSlider->multiple = 1;
        $oSlider->title = 'Лучший выбор';

        return $oSlider;
    }


}