<?php

namespace Tests\MinMaxSum;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use App\MinMaxSum\MinMaxSumCalculator;

class MinMaxSumTest extends TestCase
{
    private $calculator;

    protected function setUp() : void
    {
        $this->calculator = new MinMaxSumCalculator();
    }
    
    /**
     * @test
     * 
     * It should print two space-separated integers on one line: 
     * the minimum sum and the maximum sum of 4 of 5 elements.
     * 
     * input format: A single line of five space-separated integers.
     */
    public function printMinMaxSum()
    {
        $this->assertEquals('10 14', $this->calculator->calculate('1 3 5 4 2'));
    }

    /**
     * @test
     */
    public function throwInvalidArgumentExceptionWhenElementsAreDifferentThanFiveSpaceSeparatedIntegers()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Argument should be a sequence of five space separeted integers');
        $this->calculator->calculate('1 2 3 4');
    }

    /**
     * @test
     */
    public function throwInvalidArgumentExceptionWhenElementIsNegative()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Argument should not contain negative numbers');
        $this->calculator->calculate('-1 1 2 3 4');
    }
}
