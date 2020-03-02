<?php

declare(strict_types=1);

namespace App\Service;

use App\Factory\JourneyFactory;
use App\Collections\Collection;
use App\Validators\JsonValidators;
use App\Validators\JourneyValidators;
use App\Exceptions\InvalidJsonFormatExceptions;

/**
 * @author matkozikowski@gmail.com
 */
class JourneyService
{
    /**
     * @var JourneyFactory
     */
    private $journeyFactory;

    /**
     * @var JsonValidators
     */
    private $jsonValidators;

    /**
     * @var JourneyValidators
     */
    private $journeyValidators;

    /**
     * @param JourneyFactory    $journeyFactory
     * @param JsonValidators    $jsonValidators
     * @param JourneyValidators $journeyValidators
     */
    public function __construct(
        JourneyFactory $journeyFactory,
        JsonValidators $jsonValidators,
        JourneyValidators $journeyValidators
    ) {
        $this->journeyFactory = $journeyFactory;
        $this->jsonValidators = $jsonValidators;
        $this->journeyValidators = $journeyValidators;
    }

    /**
     * @param string $values
     * @return Collection
     * @throws InvalidJsonFormatExceptions
     */
    public function getSortedData(string $values): Collection
    {
        $jsonData = json_decode($values, true);

        if (!$this->jsonValidators->valid($jsonData)) {
            throw new InvalidJsonFormatExceptions('Invalid json');
        }

        $journeyCollection = $this->journeyFactory->process($jsonData);

        foreach ($journeyCollection->getItems() as $key => $journey) {
            $order = $this->journeyValidators->getOrderFromDestination($journey->getFrom());
            $journey->setOrder($order);

            $journeyCollection->updateItem($key, $journey);
        }

        return $journeyCollection->sort();
    }

    /**
     * @param Collection $journeyCollection
     * @return array
     */
    public function render(Collection $journeyCollection): array
    {
        $result = [];

        foreach ($journeyCollection->getItems() as $journey) {
            $result[] = $journey->getFrom();
            $result[] = $journey->getTo();
        }

        return array_unique($result);
    }
}