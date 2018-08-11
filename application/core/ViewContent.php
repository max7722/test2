<?php

namespace application\core;

/**
 * Class ViewContent
 * @package application\core
 * @property-read array $items
 */
abstract class ViewContent extends View
{
    /** @var array  */
    protected $aItems = [];

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->aItems;
    }

    /**
     * @param object|array $mItem
     * @return $this|null
     */
    public function addItem($mItem)
    {
        if (!empty($mItem)) {
            if (is_array($mItem)) {
                $this->aItems = array_merge($this->aItems, $mItem);
                return $this;
            }

            $this->aItems[] = $mItem;
            return $this;
        }

        return null;
    }

    protected function initRender()
    {
        $this->aParams['items'] = $this->aItems;

        parent::initRender();
    }

}