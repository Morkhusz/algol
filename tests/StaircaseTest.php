<?php

namespace Tests;

use App\Staircase;
use PHPUnit\Framework\TestCase;

class StaircaseTest extends TestCase
{
    /**
     * @test
     * 
     * Print a staircase of size n using # symbols and spaces.
     * The last line must have 0 spaces in it.
     * 
     * Sample output
     *      #
     *     ##
     *    ###
     *   ####
     *  #####
     * ######
     */
    public function printStaircase()
    {
        $staircase = new Staircase();
        $expectedStaircase = <<<STR
     #
    ##
   ###
  ####
 #####
######
STR;
        $this->assertEquals($expectedStaircase, $staircase->print(6));
    }

    /**
     * @test
     */
    public function sizeAndLinesShouldHaveTheSizeOfN()
    {
        $staircase = new Staircase();
        $staircase = explode(PHP_EOL, $staircase->print(4));

        $this->assertCount(4, $staircase);
        $this->assertEquals(4, strlen($staircase[rand(0, 3)]));
    }

    /**
     * @test
     */
    public function itShouldNotHaveSpacesAfterTheSharpeSymbol()
    {
        $staircase = new Staircase();
        $resultArray = explode(PHP_EOL, $staircase->print(5));
        $this->assertFalse(strpos($resultArray[3], ' ', 4));
        $this->assertFalse(strpos($resultArray[0], ' ', 4));
    }
    
    /**
     * @test
     */
    public function lastLineShouldNotHaveAnySpaces()
    {
        $staircase = new Staircase();
        $resultArray = explode(PHP_EOL, $staircase->print(5));
        $this->assertFalse(strpos($resultArray[4], ' '));
    }
}
