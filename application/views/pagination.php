<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06.05.2018
 * Time: 12:14
 */

/** @var int $count */
/** @var int $active */
/** @var int[] $leftPagin */
/** @var int[] $rightPagin */
/** @var int $midlePagin */
/** @var int $leftButtonDisable */
/** @var int $rightButtonDisable */
/** @var int $id */
/** @var string $path */

$sPath = $path;
?>
<? if ($count > 1): ?>
    <nav>
        <ul class="pagination justify-content-end">
            <li class="page-item <?if (!empty($leftButtonDisable)):?> disabled <?endif;?>">
                <a class="page-link" href="<?=$sPath . ($active - 1)?>">
                                <span aria-hidden="true">
                                    <i class="fa fa-angle-left"></i>
                                </span>
                    <span class="sr-only">Назад</span>
                </a>
            </li>
            <?if (!empty($leftPagin)): ?>
                <?foreach ($leftPagin as $iItem):?>
                    <li class="page-item <?if($iItem == $active):?> active<?endif?>">
                        <a class="page-link" href="<?=$sPath . $iItem?>"><?=$iItem?></a>
                    </li>
                <?endforeach;?>
            <?endif;?>
            <?if (!empty($midlePagin)):?>
                <li class="page-item disabled">
                    <a class="page-link" href="javascript:void(0)">...</a>
                </li>
                <?foreach ($midlePagin as $iItem):?>
                    <li class="page-item <?if($iItem == $active):?> active<?endif?>">
                        <a class="page-link" href="<?=$sPath . $iItem?>"><?=$iItem?></a>
                    </li>
                <?endforeach;?>
            <?endif;?>
            <?if (!empty($rightPagin)): ?>
                <li class="page-item disabled">
                    <a class="page-link" href="javascript:void(0)">...</a>
                </li>
                <?foreach ($rightPagin as $iItem):?>
                    <li class="page-item <?if($iItem == $active):?> active<?endif?>">
                        <a class="page-link" href="<?=$sPath . $iItem?>"><?=$iItem?></a>
                    </li>
                <?endforeach;?>
            <?endif;?>
            <li class="page-item <?if (!empty($rightButtonDisable)):?> disabled <?endif;?>">
                <a class="page-link" href="<?=$sPath . ($active + 1)?>">
                                <span aria-hidden="true">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                    <span class="sr-only">Вперед</span>
                </a>
            </li>
        </ul>
    </nav>
<? endif; ?>
