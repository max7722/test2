<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 09.05.2018
 * Time: 15:08
 */

/** @var \application\models\Delivery[] $deliveryList */

?>
<div class="content">
    <div class="block">
        <div class="block-content">
            <div class="row justify-content-center py-20">
                <form class="js-validation-bootstrap col-md-6" action="/cart/confirm" method="post" novalidate="novalidate">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="val-username">Ваше имя <span class="text-danger">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Ваше имя">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="val-email">Почта <span class="text-danger">*</span></label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="val-email" name="val-email" placeholder="Email">
                        </div>
                    </div>
                    <? if (!empty($deliveryList)): ?>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Тип доставки <span class="text-danger">*</span></label>
                            <div class="col-lg-12">
                                <select class="form-control" id="val-skill" name="val-delivery" aria-describedby="val-skill-error" aria-invalid="true">
                                    <option value="" disabled selected>Выберите тип доставки</option>
                                    <? foreach ($deliveryList as $delivery): ?>
                                        <option value="<?=$delivery->id?>"><?=$delivery->name?></option>
                                    <? endforeach;?>
                                </select>
                            </div>
                        </div>
                    <? endif; ?>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="val-suggestions">Коментарий </label>
                        <div class="col-lg-12">
                            <textarea class="form-control" id="val-suggestions" name="val-coment" rows="5" placeholder="Коментарий к заказу"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                <input type="checkbox" class="css-control-input" id="val-terms" name="val-confirm" value="1">
                                <span class="css-control-indicator"></span> Я согласен с политикой конфиденциальности<span class="text-danger">*</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 ml-auto">
                            <button type="submit" class="btn btn-alt-primary js-confirm">Оформить заказ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
