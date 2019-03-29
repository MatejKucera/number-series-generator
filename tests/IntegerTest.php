<?php

use MatejKucera\NumberSeriesGenerator\IntegerGenerator;
use PHPUnit\Framework\TestCase;

final class IntegerTest extends TestCase
{
	
	public static function setUpBeforeClass()
    {

    }

    public function testConstructor(): void {
        $generator = new IntegerGenerator(1, 100, 5, 10, 1);
        $this->assertEquals(1,   $generator->getRangeFrom());
        $this->assertEquals(100, $generator->getRangeTo());
        $this->assertEquals(5,   $generator->getStepFrom());
        $this->assertEquals(10,  $generator->getStepTo());
        $this->assertEquals(1,   $generator->getVolatility());
    }

    public function testBoundaries() {
        $generator = new IntegerGenerator(1000, 5000, 1, 50, 1, 10);

        $previous = 0;

        for($i = 0; $i < 1000; $i++) {
            $current = $generator->next();
            if(!$previous) $previous = $current;

            $this->assertLessThanOrEqual(5000, $current);
            $this->assertGreaterThanOrEqual(1000, $current);


            $this->assertLessThanOrEqual($generator->getStepTo(), abs($current - $previous));

            $previous = $current;
        }
    }

    public function testArray() {
        $generator = new IntegerGenerator(1000, 5000, 1, 50, 1, 10);

        $generatedArray = $generator->array(100);

        $this->assertTrue(is_array($generatedArray));
        $this->assertEquals(100, count($generatedArray));
    }
}
