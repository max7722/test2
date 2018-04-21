<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.04.2018
 * Time: 21:49
 */

/** @var \application\models\Category $category */
/** @var \application\core\View $goodsRowView */

?>
<h1><?=$category->name?></h1>

<?=$goodsRowView->render()?>



