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
<?php if ($count > 1): ?>
    <nav>
        <ul class="pagination justify-content-end">
            <li class="page-item <?php if (!empty($leftButtonDisable)): ?> disabled <?php endif; ?>">
                <a class="page-link" href="<?=$sPath . ($active - 1)?>">
                                <span aria-hidden="true">
                                    <i class="fa fa-angle-left"></i>
                                </span>
                    <span class="sr-only">Назад</span>
                </a>
            </li>
            <?php if (!empty($leftPagin)): ?>
                <?php foreach ($leftPagin as $iItem): ?>
                    <li class="page-item <?php if($iItem == $active): ?> active<?php endif ?>">
                        <a class="page-link" href="<?=$sPath . $iItem?>"><?=$iItem?></a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if (!empty($midlePagin)): ?>
                <li class="page-item disabled">
                    <a class="page-link" href="javascript:void(0)">...</a>
                </li>
                <?php foreach ($midlePagin as $iItem): ?>
                    <li class="page-item <?php if($iItem == $active): ?> active<?php endif; ?>">
                        <a class="page-link" href="<?=$sPath . $iItem?>"><?=$iItem?></a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if (!empty($rightPagin)): ?>
                <li class="page-item disabled">
                    <a class="page-link" href="javascript:void(0)">...</a>
                </li>
                <?php foreach ($rightPagin as $iItem): ?>
                    <li class="page-item <?php if($iItem == $active): ?> active<?php endif; ?>">
                        <a class="page-link" href="<?=$sPath . $iItem?>"><?=$iItem?></a>
                    </li>
                <?php endforeach; ?>
            <? endif; ?>
            <li class="page-item <?php if (!empty($rightButtonDisable)): ?> disabled <?php endif; ?>">
                <a class="page-link" href="<?=$sPath . ($active + 1)?>">
                                <span aria-hidden="true">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                    <span class="sr-only">Вперед</span>
                </a>
            </li>
        </ul>
    </nav>
<?php endif; ?>
