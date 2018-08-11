<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 31.05.2018
 * Time: 22:44
 */

namespace application\core\view;


use application\core\View;

/**
 * Class Answer
 * @package application\core\view
 * @property string path
 * @property string text
 */
class Answer extends View
{
    protected $template = 'answer.php';

    protected function init()
    {
        $this->aParams['path'] = '';
        $this->aParams['text'] = '';
    }

    protected function setPath($value)
    {
        $this->aParams['path'] = $value;
    }

    protected function setText($value)
    {
        $this->aParams['text'] = $value;
    }
}