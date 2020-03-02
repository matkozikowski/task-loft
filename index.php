<?php

require "vendor/autoload.php";

use \DI\ContainerBuilder;
use App\Commands\JourneySortCommands;
use App\Exceptions\InvalidJsonFormatExceptions;
use App\Factory\JourneyFactory;
use App\Service\JourneyService;
use App\Validators\JsonValidators;
use App\Validators\JourneyValidators;

$values = getopt(null, ["json:"]);

try {
    if ($values !== false) {

        $containerBuilder = new ContainerBuilder();

        $containerBuilder->addDefinitions([
            'JourneyFactory' => JourneyFactory::class,
            'JourneyService' => JourneyService::class,
            'JourneySortCommands' => JourneySortCommands::class,
            'JsonValidators' => JsonValidators::class,
            'JourneyValidators' => JourneyValidators::class,
        ]);

        $container = $containerBuilder->build();

        $command = $container->get(JourneySortCommands::class);
        $command->run($values);
    }
} catch (InvalidJsonFormatExceptions $e) {
    sprintf('Error handled: %s', $e->getMessage());
}
