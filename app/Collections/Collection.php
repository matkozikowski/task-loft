<?php

declare(strict_types=1);

namespace App\Collections;

/**
 * @author matkozikowski@gmail.com
 */
class Collection
{
    private $items = [];

    /**
     * @param mixed $obj
     * @param null $key
     */
    public function addItem($obj, $key = null)
    {
        if (array_key_exists($key, $this->items)) {
            $this->items[$key] = $obj;
        } else {
            $this->items[] = $obj;
        }
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return  $this->items;
    }

    /**
     * @param int $key
     * @param mixed $value
     */
    public function updateItem(int $key, $value): void
    {
        if (isset($this->items[$key])) {
            $this->items[$key] = $value;
        }
    }

    public function sort()
    {
        usort($this->items, function($object1, $object2) {
            return $object1->getOrder() > $object2->getOrder();
        });

        return $this;
    }
}