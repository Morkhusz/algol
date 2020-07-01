<?php

namespace Tests;

use App\FizzBuzz\FizzBuzz;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /**
     * @test
     * Write a short program that prints each number from 1 to 100 on a new line. 
     *
     * For each multiple of 3, print "Fizz" instead of the number. 
     * For each multiple of 5, print "Buzz" instead of the number. 
     * For numbers which are multiples of both 3 and 5, print "FizzBuzz" instead of the number.
     */
    public function shouldPrintFizzOnMultipleOfThreeBuzzOnMultipleOfFiveAndFizzBuzzOnMultiplesOfThreeAndFive()
    {
        $fizzBuzz = new FizzBuzz();
        preg_match_all("/Fizz/", $fizzBuzz->fizzBuzz(1, 10), $fizz);
        preg_match_all("/Buzz/", $fizzBuzz->fizzBuzz(1, 10), $buzz);
        preg_match_all("/FizzBuzz/", $fizzBuzz->fizzBuzz(1, 30), $fizzBuzz);
        $this->assertCount(3, $fizz[0]);
        $this->assertCount(2, $buzz[0]);
        $this->assertCount(2, $fizzBuzz[0]);
    }

    /**
     * @test
     */
    public function shouldThrowExceptionWhenStartNumberIsLowerThenEndingNumber()
    {
        $fizzBuzz = new FizzBuzz();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The ending number MUST be greater than the starting number');
        $fizzBuzz->fizzBuzz(2,1);
    }

    /**
     * @test
     */
    public function shouldThrowExceptionWhenNegativeNumbersArePassedAsParam()
    {
        $fizzBuzz = new FizzBuzz();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Negative numbers are not allowed');
        $fizzBuzz->fizzBuzz(-2,1);
    }
}