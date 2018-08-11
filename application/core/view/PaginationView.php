<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 06.05.2018
 * Time: 12:20
 */

namespace application\core\view;


use application\core\View;

/**
 * Class PaginationView
 * @package application\core\view
 * @property int count
 * @property int active
 * @property int id
 */
class PaginationView extends View
{
    protected $template = 'pagination.php';

    protected function init()
    {
        $this->aParams['count'] = 0;
        $this->aParams['active'] = 1;
        $this->aParams['maxCount'] = 5;
        $this->aParams['leftMaxCount'] = 3;
        $this->aParams['id'] = '';
        $this->aParams['path'] = '';
    }

    /**
     * @param int $iValue
     */
    protected function setId($iValue)
    {
        $this->aParams['id'] = $iValue;
    }

    /**
     * @param int $iCount
     */
    protected function setCount($iCount)
    {
        $this->aParams['count'] = $iCount;
    }

    /**
     * @param int $iActive
     */
    protected function setActive($iActive)
    {
        $this->aParams['active'] = $iActive;
    }

    /**
     * @param int $iMaxCount
     */
    protected function setMaxCount($iMaxCount)
    {
        $this->aParams['maxCount'] = $iMaxCount;
    }

    /**
     * @param int $iValue
     */
    protected function setLeftMaxCount($iValue)
    {
        $this->aParams['leftMaxCount'] = $iValue;
    }

    /**
     * @param string $value
     */
    protected function setPath($value)
    {
        $this->aParams['path'] = $value;
    }

    protected function initRender()
    {
        $iCount = $this->aParams['count'];
        if ($iCount > 1) {
            if ($iCount > $this->aParams['maxCount']) {
                $this->aParams['isComposite'] = 1;

                $iHalfLeftPagin = intval($this->aParams['leftMaxCount'] / 2) + 1;
                $iRightCount = $this->aParams['maxCount'] - $this->aParams['leftMaxCount'];
                if ($this->aParams['active'] <= $iHalfLeftPagin) {
                    $this->aParams['leftPagin'] = range(1, $this->aParams['leftMaxCount']);
                    $this->aParams['rightPagin'] = range($iCount - $iRightCount, $iCount);
                } elseif ($iCount - $this->aParams['active'] <= $iRightCount) {//если елемент находится в правой части пагинатора
                    $this->aParams['leftPagin'] = range(1, $iRightCount);
                    $this->aParams['rightPagin'] = range($iCount - $this->aParams['leftMaxCount'], $iCount);
                } else {
                    $this->aParams['leftPagin'] = range(1, 2);
                    $this->aParams['rightPagin'] = range($iCount - $iRightCount, $iCount);
                    $this->aParams['midlePagin'] = range($this->aParams['active'] - 1, $this->aParams['active'] + 1);
                }
            } else {
                $this->aParams['isComposite'] = 0;

                $this->aParams['leftPagin'] = range(1, $iCount);
            }

            if ($this->aParams['active'] == 1) {
                $this->aParams['leftButtonDisable'] = 1;
            }

            if ($this->aParams['active'] == $iCount) {
                $this->aParams['rightButtonDisable'] = 1;
            }
        }

        parent::initRender();
    }

}