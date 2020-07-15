<?php

namespace Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use App\PlusMinus;

class PlusMinusTest extends TestCase
{

    /**
     * @test
     * Given an array of integers, calculate the fractions of its elements that 
     * are positive, negative, and are zeros.
     * 
     * Print the decimal value of each fraction on a new line.
     * 
     * Note: This challenge introduces precision problems. 
     * The test cases are scaled to six decimal places,
     * though answers with absolute error of up to are acceptable.
     */
    public function shouldCalculateTheFractionCorrectly()
    {
        $plusMinus = new PlusMinus();
        $this->assertEquals(["0.500000", "0.500000", "0"], $plusMinus->calculate([4, [1, 5, -2, -10]]));
        $this->assertEquals(["0.000000", "0.000000", "1.000000"], $plusMinus->calculate([4, [0, 0, 0, 0]]));
    }
    /**
     * @test
     */
    public function throwInvalidArgumentExceptionWhenTheSizeOfElementsAreDifferentThanTheFirstLineInteger()
    {
        $arr = [
            5,
            [
                1, 2, 3, 4
            ]
        ];
        $plusMinus = new PlusMinus();
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('The size of the elements should be equal to the integer on the first line');
        $plusMinus->calculate($arr);
    }

    /**
     * @test
     */
    public function throwExceptionWhenSecondArrayIndexIsNotAnArray()
    {
        $arr = [
            5,
            4
        ];
        $plusMinus = new PlusMinus();
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('The second array line MUST be another array');
        $plusMinus->calculate($arr);
    }
}