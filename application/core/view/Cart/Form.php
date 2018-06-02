<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 09.05.2018
 * Time: 16:53
 */

namespace application\core\view\Cart;


use application\core\View;
use application\core\view\TemplateConfig;
use application\models\Delivery;

/**
 * Class Form
 * @package application\core\view\Cart
 * @property-read Delivery[] deliveryList
 */
class Form extends View
{
    protected $template = 'cart/form.php';

    protected $aJsList = [
        TemplateConfig::ASSETS_FOLDER . '/js/plugins/jquery-validation/jquery.validate.min.js',
        TemplateConfig::ASSETS_FOLDER . '/js/pages/be_forms_validation.js',
    ];

    protected function init()
    {
        $this->aParams['deliveryList'] = [];
    }

    /**
     * @param Delivery|Delivery[] $mDelivery
     * @return bool
     */
    public function addDelivery($mDelivery)
    {
        if (empty($mDelivery)) {
            return false;
        }

        if (is_array($mDelivery)) {
            $this->aParams['deliveryList'] = array_merge($this->aParams['deliveryList'], $mDelivery);

            return true;
        }

        $this->aParams['deliveryList'][] = $mDelivery;

        return true;
    }
}