<?php
/** @var \application\models\Goods $goods */
?>

<div class="row gutters-tiny">
    <!-- Basic Info -->
    <div class="content">
        <h2 class="content-heading"><a href="/admin/goods/list"><К списку товаров</a></h2>
        <form action="/admin/goods/show/<?= $goods->id ?>" method="post"">
            <div class="block block-rounded block-themed">
                <div class="block-header bg-gd-primary">

                    <h3 class="block-title">Информация о товаре</h3>
                    <div class="block-options">
                        <button type="submit" name="delete" value="1" class="btn btn-sm btn-alt-primary">Удалить</button>
                        <button type="submit" class="btn btn-sm btn-alt-primary">
                            <i class="fa fa-save mr-5"></i>Сохранить
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <div class="form-group row">
                        <label class="col-12">ID товара</label>
                        <div class="col-12">
                            <div class="form-control-plaintext"><?= $goods->id ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="ecom-product-name">Название</label>
                        <div class="col-12">
                            <input type="text" class="form-control" id="ecom-product-name" name="name" placeholder="Product Name" value="<? if ($goods->name): ?><?= $goods->name ?><? else: ?>Новый товар<? endif; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label class="css-control css-control-success css-switch">
                                Активность
                                <input type="checkbox" class="css-control-input" id="ecom-product-published" name="active" <? if ($goods->active): ?>checked<? endif; ?>>
                                <span class="css-control-indicator"></span>
                            </label>
                            <label class="css-control css-control-primary css-switch">
                                Хит
                                <input type="checkbox" class="css-control-input" id="ecom-product-published" name="hit" <? if ($goods->hit): ?>checked<? endif; ?>>
                                <span class="css-control-indicator"></span>
                            </label>
                            <label class="css-control css-control-danger css-switch">
                                Новинка
                                <input type="checkbox" class="css-control-input" id="ecom-product-published" name="new" <? if ($goods->new): ?>checked<? endif; ?>>
                                <span class="css-control-indicator"></span>
                            </label>
                            <label class="css-control css-control-secondary css-switch">
                                Лучший выбор
                                <input type="checkbox" class="css-control-input" id="ecom-product-published" name="luck" <? if ($goods->luck): ?>checked<? endif; ?>>
                                <span class="css-control-indicator"></span>
                            </label>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-12">Описание</label>
                        <div class="col-12">
                            <textarea class="form-control" id="js-ckeditor" name="js-ckeditor" placeholder="Main Description" rows="8"><? if ($goods->description): ?><?= $goods->description ?><? endif; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="ecom-product-price">Цена</label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">Р</span>
                                </div>
                                <input type="text" class="form-control" id="ecom-product-price" name="price" placeholder="Цена в рублях" value="<? if ($goods->price): ?><?= $goods->price ?><? else: ?>0,00<? endif; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <? if ($goods->id): ?>
            <div class="block block-rounded block-themed">
                <form action="/admin/goods/save/<?= $goods->id ?>" enctype="multipart/form-data" method="post">
                    <div class="block-header bg-gd-primary">
                        <h3 class="block-title">Изображение</h3>
                        <div class="block-options">
                            <button type="submit" class="btn btn-sm btn-alt-primary">
                                <i class="fa fa-save mr-5"></i>Сохранить
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="col-md-4" align="center" >
                            <? if ($goods->image): ?>
                                <img class="img-fluid" style="max-height: 250px;" src="/<?= $goods->image ?>">
                            <? else: ?>
                            <span>Изображения нет</span>
                            <br>
                            <? endif; ?>
                        </div>
                        <input type="file" name="image" accept=".png,.jpg,.jpeg">
                        <input type="hidden" name="id" value="<?= $goods->id ?>">
                    </div>
                </form>
            </div>
        <? endif; ?>
    </div>
    <!-- END Basic Info -->
    <!-- END More Options -->
</div>
