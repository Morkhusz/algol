<?php

namespace Tests;

use App\FizzBuzz\FizzBuzz;
use App\FizzBuzz\InvalidStringException;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /**
     * @test
     * For multiples of three output "Fizz" instead of the value
     */
    public function shouldPrintFizzOnMultiplesOfThree()
    {
        $fizzBuzz = new FizzBuzz();
        $response = '1,2,Fizz,4,5,Fizz,7,8,Fizz,10';
        $integers = '1,2,3,4,5,6,7,8,9,10';

        $this->assertEquals($response, $fizzBuzz->printFizzOnMultiplesOfThree($integers));
    }

    /**
     * @test
     * For multiples of five output "Buzz".
     */
    public function shouldPrintBuzzOnMultiplesOfFive()
    {
        $fizzBuzz = new FizzBuzz();
        $response = '1,2,3,4,Buzz,6,7,8,9,Buzz';
        $integers = '1,2,3,4,5,6,7,8,9,10';

        $this->assertEquals($response, $fizzBuzz->printBuzzOnMultiplesOfFive($integers));
    }

    /**
     * @test
     * For multiples of three and five output "FizzBuzz".
     */
    public function shouldPrintFizzBuzzOnMultiplesOfThreeAndFive()
    {
        $fizzBuzz = new FizzBuzz();
        $response = '1,2,3,4,5,6,7,8,9,10,11,12,13,14,FizzBuzz';
        $integers = '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15';

        $this->assertEquals($response, $fizzBuzz->printFizzBuzzOnMultiplesOfThreeAndFive($integers));
    }

    /**
     * @test
     * For multiples of three output "Fizz" instead of the value
     * For multiples of five output "Buzz".
     * For multiples of three and five output "FizzBuzz".
     */
    public function shouldPrintFizzOnMultipleOfThreeBuzzOnMultipleOfFiveAndFizzBuzzOnMultiplesOfThreeAndFive()
    {
        $fizzBuzz = new FizzBuzz();
        $response = '1,2,Fizz,4,Buzz,Fizz,7,8,Fizz,Buzz,11,Fizz,13,14,FizzBuzz';
        $integers = '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15';

        $this->assertEquals($response, $fizzBuzz->fizzBuzz($integers));
    }

    /**
     * @test
     */
    public function shouldThrowExceptionFromInvalidStrings()
    {
        $fizzBuzz = new FizzBuzz();
        $invalidString = '1,2,3,four,five,6,7,8,9,ten';
        $this->expectException(InvalidStringException::class);
        $this->expectExceptionMessage('String must contain comma separated integers only');
        $fizzBuzz->fizzBuzz($invalidString);
    }
}