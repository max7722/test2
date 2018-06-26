<?php
/** @var \application\models\Category $category */
?>

<div class="row gutters-tiny">
    <!-- Basic Info -->
    <div class="content">
        <h2 class="content-heading"><a href="/admin/category/list"><К списку категорий</a></h2>
        <form action="/admin/category/show/<?= $category->id ?>" method="post"">
        <div class="block block-rounded block-themed">
            <div class="block-header bg-gd-primary">

                <h3 class="block-title">Информация о категории</h3>
                <div class="block-options">
                    <button type="submit" name="delete" value="1" class="btn btn-sm btn-alt-primary">Удалить</button>
                    <button type="submit" class="btn btn-sm btn-alt-primary">
                        <i class="fa fa-save mr-5"></i>Сохранить
                    </button>
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="form-group row">
                    <label class="col-12">ID категории</label>
                    <div class="col-12">
                        <div class="form-control-plaintext"><?= $category->id ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12" for="ecom-product-name">Название</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="ecom-product-name" name="name" placeholder="Product Name" value="<?php if ($category->name): ?><?= $category->name ?><?php else: ?>Новая категория<?php endif; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <label class="css-control css-control-success css-switch">
                            Активность
                            <input type="checkbox" class="css-control-input" id="ecom-product-published" name="active" <?php if ($category->active): ?>checked<?php endif; ?>>
                            <span class="css-control-indicator"></span>
                        </label>
                        <label class="css-control css-control-primary css-switch">
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-12">Описание</label>
                    <div class="col-12">
                        <textarea class="form-control" id="js-ckeditor" name="js-ckeditor" placeholder="Main Description" rows="8"><?php if ($category->description): ?><?= $category->description ?><?php endif; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <?php if ($category->id): ?>
            <div class="block block-rounded block-themed">
                <form action="/admin/category/save/<?= $category->id ?>" enctype="multipart/form-data" method="post">
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
                            <?php if ($category->image): ?>
                                <img class="img-fluid" style="max-height: 250px;" src="/<?= $category->image ?>">
                            <?php else: ?>
                                <span>Изображения нет</span>
                                <br>
                            <?php endif; ?>
                        </div>
                        <input type="file" name="image" accept=".png,.jpg,.jpeg">
                        <input type="hidden" name="id" value="<?= $category->id ?>">
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
    <!-- END Basic Info -->
    <!-- END More Options -->
</div>
