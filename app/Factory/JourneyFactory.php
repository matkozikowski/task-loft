<?php

declare(strict_types=1);

namespace App\Factory;

use App\Collections\Collection;
use App\Model\JourneyDTO;

/**
 * @author matkozikowski@gmail.com
 */
class JourneyFactory
{
    /**
     * @param array $items
     */
    public function process(array $items): Collection
    {
        $collection = new Collection();
        foreach ($items as $key => $item) {
            $journeyDTO = new JourneyDTO();
            $journeyDTO->setFrom($item['from']);
            $journeyDTO->setTo($item['to']);

            $collection->addItem($journeyDTO, $key);
        }

        return $collection;
    }


}