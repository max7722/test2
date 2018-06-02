<?php
/** @var string $name */
/** @var string $password */
/** @var bool $error */

?>
<div class="content">
    <div class="block">
        <div class="block-content">
            <div class="row justify-content-center py-20">
                <form class="js-validation-bootstrap col-md-6" action="/auth" method="post" novalidate="novalidate">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="val-username">Логин</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Ваше имя" <? if ($name): ?>value="<?=$name?>" <? endif; ?>>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="val-password">Парлоль</label>
                        <div class="col-lg-12">
                            <input type="password" class="form-control valid" id="val-password" name="val-password" placeholder="Введите пароль" aria-describedby="val-password-error" aria-invalid="false"<? if ($password): ?>value="<?=$password?>" <? endif; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 ml-auto">
                            <button type="submit" class="btn btn-alt-primary js-confirm">Войти</button>
                        </div>
                    </div>
                    <? if ($error): ?>
                        <div class="form-group row is-invalid">
                            <div class="invalid-feedback animated fadeInDown">Неправильный логин, или пароль</div>
                        </div>
                    <? endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>
