<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 05.06.2018
 * Time: 20:42
 */

namespace application\core\view\Gallery;


use application\core\View;

/**
 * Class Slider
 * @package application\core\view\Gallery
 * @property View view
 * @property string title
 * @property int multiple
 */
class Slider extends View
{
    const TMP_SLIDER = 'gallery/slider.php';

    const TMP_CAROUSEL = 'gallery/carousel.php';

    protected $template = 'gallery/slider.php';

    protected function init()
    {
        $this->aParams['title'] = '';
        $this->aParams['view'] = '';
        $this->aParams['multiple'] = '';
    }

    /**
     * @param string $value
     */
    protected function setTitle($value)
    {
        $this->aParams['title'] = $value;
    }

    /**
     * @param View $value
     */
    protected function setView($value)
    {
        $this->aParams['view'] = $value;
    }

    /**
     * @param int $value
     */
    protected function setMultiple($value)
    {
        $this->aParams['multiple'] = $value;
    }
}