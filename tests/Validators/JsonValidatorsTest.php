<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Validators\JsonValidators;

/**
 * @author matkozikowski@gmail.com
 */
final class JsonValidatorsTest extends TestCase
{
    /**
     * @covers JsonValidators::valid()
     * @dataProvider getJsonData
     */
    public function testValidJson($expected, $values): void
    {
        $jsonValidator = new JsonValidators();
        $jsonData = json_decode($values, true);

        $this->assertEquals($expected, $jsonValidator->valid($jsonData));
    }

    /**
     * @return array
     */
    public function getJsonData(): array
    {
        return [
            [
                true, '[{"from": "Adolfo Suárez Madrid–Barajas Airport, Spain","to": "London Heathrow, UK"},{"from": "Fazenda São Francisco Citros, Brazil","to": "São Paulo–Guarulhos International Airport, Brazil"}]'
            ],
            [
                false, '[]'
            ]
        ];
    }
}