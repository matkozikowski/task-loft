<?php

declare(strict_types=1);

use App\Validators\JourneyValidators;
use PHPUnit\Framework\TestCase;

/**
 * @author matkozikowski@gmail.com
 */
final class JourneyValidatorsTest extends TestCase
{
    /**
     * @covers       JourneyValidators::getOrderFromDestination()
     * @dataProvider getDesinationData
     */
    public function testIfDestinationReturnCorrectOrderValue($expected, $value): void
    {
        $journeyValidators = new JourneyValidators();

        $this->assertEquals($expected, $journeyValidators->getOrderFromDestination($value));
    }

    public function testIfDestinationReturnZeroIfCompaniesNotExists(): void
    {
        $journeyValidators = new JourneyValidators();

        $this->assertEquals(
            0,
            $journeyValidators->getOrderFromDestination('Not included Name of Company in App Config')
        );
    }

    /**
     * @return array
     */
    public function getDesinationData(): array
    {
        return [
            [
                0,
                'Fazenda São Francisco Citros, Brazil'
            ],
            [
                1,
                'São Paulo–Guarulhos International Airport, Brazil'
            ],
            [
                2,
                'Porto International Airport, Portugal'
            ],
            [
                3,
                'Adolfo Suárez Madrid–Barajas Airport, Spain'
            ],
            [
                4,
                'London Heathrow, UK'
            ],
            [
                5,
                '​Loft Digital, London, UK​'
            ],
        ];
    }
}