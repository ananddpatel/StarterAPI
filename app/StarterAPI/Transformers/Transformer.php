<?php 

namespace App\StarterAPI\Transformers;

/**
* Abstract class for data Transformation
*/
abstract class Transformer
{
	/**
     * Transforms all $items
     * @param  Collection $items collection of items to transform
     * @return Array      returns array of all items
     */
    public function transformCollection($items)
    {
        return array_map(function($item) {return $this->transform($item);}, $items->toArray());
    }

    /**
     * Transforms a single Item
     * @param  Item $item item array to transform
     * @return array         tranformed item array
     */
    public abstract function transform($item);
}
