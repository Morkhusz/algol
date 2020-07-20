<?php

namespace Tests\BDayCakeCandles;

use App\BDayCakeCandles\BirthdayCakeCandles;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class BirthdayCakeCandlesTest extends TestCase
{
    protected function setUp() : void
    {
        $this->birthdayCakeCandles = new BirthdayCakeCandles();
    }

    /**
     * The cake will have one candle for each year of total age.
     * With ONE blow, only the tallest ones are able to be blown out.
     * Your task is to find out how many candles can be successfully blow out with one blow.
     * 
     * Input format:
     * The first line contains a single integer, n, denoting the number of candles on the cake. 
     * The second line contains n space-separated integers, where each integer i describes the height of candle i.
     * 
     * @test
     */
    public function twoCandlesShouldBeBlownOut()
    {
        $candles = <<<STR
7
1 3 2 2 1 3 2
STR;
        $this->assertEquals(2, $this->birthdayCakeCandles->blow($candles));
    }

    /**
     * @test
     */
    public function itShouldThrowExceptionWhenFirstLineIsNegative()
    {
        $candles = <<<STR
-7
1 3 2 2 1 3 2
STR;
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('First line should be a positive integer');
        $this->birthdayCakeCandles->blow($candles);
    }

    /**
     * @test
     */
    public function itShouldThrowExceptionWhenSecondLinesSizeIsDifferentThanFirstLineInteger()
    {
        $candles = <<<STR
7
3 2 2 1 3 2
STR;
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The size is different from the first line integer');
        $this->birthdayCakeCandles->blow($candles);
    }

    /**
     * @test
     */
    public function shouldThrowExceptionWhenInputIsNotTwoLinesLong()
    {
        $candles = <<<STR
3 2 2 1 3 2
STR;
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Input should have two lines with the candles amount and height respectively');
        $this->birthdayCakeCandles->blow($candles);
    }
}
