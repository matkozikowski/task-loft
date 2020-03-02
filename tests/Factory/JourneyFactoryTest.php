<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use App\Factory\JourneyFactory;
use App\Collections\Collection;

/**
 * @author matkozikowski@gmail.com
 */
final class JourneyFactoryTest extends TestCase
{
    public function testIfProcessFactoryCollection(): void
    {
        $journeYFactory = new JourneyFactory();

        $this->assertInstanceOf(
            Collection::class,
            $journeYFactory->process([])
        );
    }
    
}