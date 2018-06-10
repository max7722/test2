<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 10.06.2018
 * Time: 10:17
 */

namespace application\core\view\Gallery;


use application\core\View;

/**
 * Class ImageList
 * @package application\core\view\Gallery
 * @property-read imageList
 */
class ImageList extends View
{
    protected $template = 'gallery/imageList.php';

    protected function init()
    {
        $this->aParams['imageList'] = [];
    }

    /**
     * @param string|string[] $mImage
     */
    public function addImage($mImage)
    {
        if (is_array($mImage)) {
            $this->aParams['imageList'] = array_merge($this->aParams['imageList'], $mImage);
            return;
        }

        $this->aParams['imageList'][] = $mImage;
    }
}