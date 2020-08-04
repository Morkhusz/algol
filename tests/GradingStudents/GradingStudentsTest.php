<?php

namespace Tests;

use App\GradingStudents\GradingStudents;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class GradingStudentsTest extends TestCase
{
    protected function setUp() : void
    {
        $this->gradingStudents = new GradingStudents();
    }

    /**
     * @test
     * @dataProvider wrongFirstLineProvider
     */
    public function firstLineShouldBeAPositiveIntegerBetweenOneAndSixtyRepresentingTheNumberOfStudents($grades)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('First line should be a positive integer between 1 and 60');
        $this->gradingStudents->roundGrades($grades);
    }

    public function wrongFirstLineProvider()
    {
        $grades1 = <<<GRADES
-1
50
30
40
GRADES;
        $grades2 = <<<GRADES
70
50
30
40
GRADES;
        return [
            [$grades1],
            [$grades2]
        ];
    }

    /**
     * @test
     * @dataProvider wrongSubsequentLinesProvider
     */
    public function eachLineOfTheSubsequentLinesShouldContainASingleIntegerBetweenZeroAndOneHundred($grades)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Grades should be a number between 0 and 100');
        $this->gradingStudents->roundGrades($grades);
    }

    public function wrongSubsequentLinesProvider()
    {
        $grades1 = <<<GRADES
3
-50
30
40
GRADES;
        $grades2 = <<<GRADES
3
50
30
101
GRADES;
        return [
            [$grades1],
            [$grades2]
        ];
    }

    /**
     * @test
     */
    public function theGradesAmountShouldBeEqualToTheFirstLineInteger()
    {
        $grades = <<<GRADES
5
30
40
50
GRADES;
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The grades amount should be equal to the studens amount');
        $this->gradingStudents->roundGrades($grades);
    }

    /**
     * @test
     */
    public function shouldPrintTheCorrectRoundedGrades()
    {
        $grades = <<<GRADES
4
73
67
38
33
GRADES;
        $expected = <<<GRADES
75
67
40
33
GRADES;
        $this->assertEquals($expected, $this->gradingStudents->roundGrades($grades));
    }
}
