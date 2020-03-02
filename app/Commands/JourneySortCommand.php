<?php

declare(strict_types=1);

namespace App\Commands;

use App\Exceptions\InvalidJsonFormatExceptions;
use App\Service\JourneyService;

/**
 * @author matkozikowski@gmail.com
 */
class JourneySortCommands
{
    /**
     * @var JourneyService
     */
    private $journeyService;

    /**
     * @param JourneyService $journeyService
     */
    public function __construct(JourneyService $journeyService)
    {
        $this->journeyService = $journeyService;
    }

    public function run(array $values): void
    {
        if (!array_key_exists('json', $values) || empty($values)) {
            throw new InvalidJsonFormatExceptions(sprintf('Missing parameter --json'));
        }

        $journeyList = $this->journeyService->getSortedData($values['json']);
        $result = $this->journeyService->render($journeyList);

        print_r($result);
    }
}