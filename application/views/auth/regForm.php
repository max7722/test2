<?php
/** @var string $name */
/** @var string $password */
/** @var string $retryPassword */
/** @var string $email */
/** @var bool $agreed */
/** @var bool $error */


?>
<div class="content">
    <div class="block">
        <div class="block-content">
            <div class="row justify-content-center py-20">
                <form class="js-validation-bootstrap col-md-6" action="/auth/register" method="post" novalidate="novalidate">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="val-username">Логин</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Ваше имя" <? if ($name): ?>value="<?=$name?>" <? endif; ?>>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="val-password">Парлоль</label>
                        <div class="col-lg-12">
                            <input type="password" class="form-control valid" id="val-password" name="val-password" placeholder="Введите пароль" aria-describedby="val-password-error" aria-invalid="false" <? if ($password): ?>value="<?=$password?>" <? endif; ?>>
                        </div>
                    </div>

<!--                    <div class="form-group row">-->
<!--                        <label class="col-lg-4 col-form-label" for="val-password">Парлоль</label>-->
<!--                        <div class="col-lg-12">-->
<!--                            <input type="password" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="Повторите пароль" --><?// if ($retryPassword): ?><!--value="--><?//=$retryPassword?><!--" --><?// endif; ?><!-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="val-email">Почта</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="val-email" name="val-email" placeholder="Email" <? if ($email): ?>value="<?=$email?>" <? endif; ?>>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                <input type="checkbox" class="css-control-input" id="val-terms" name="val-confirm" value="1" <? if ($agreed): ?> check <? endif; ?>>
                                <span class="css-control-indicator"></span> Я согласен с политикой конфиденциальности<span class="text-danger">*</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12 ml-auto">
                            <button type="submit" class="btn btn-alt-primary js-confirm">Зарегистрироваться</button>
                        </div>
                    </div>

                    <? if ($error): ?>
                        <div class="form-group row is-invalid">
                            <div class="invalid-feedback animated fadeInDown">Такой логин уже существует</div>
                        </div>
                    <? endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>