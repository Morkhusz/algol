<?php

namespace Tests\DiagonalDifference;

use App\DiagonalDifference\DiagonalDifferenceCalculator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class DiagonalDifferenceTest extends TestCase
{
    /**
     * @test
     * 
     * Given a square matrix of size N×N, calculate the absolute difference between the sums of its diagonals.
     * Input Format
     * The first line contains a single integer, N. The next N lines denote the matrix's rows, with each line
     * containing N space-separated integers describing the columns.
     * Output Format
     * Print the absolute difference between the two sums of the matrix's diagonals as a single integer.
     * Sample Input
     * 3
     * 11 2 4
     * 4 5 6
     * 10 8 -12
     * Sample Output
     * 15
     * Explanation
     * The primary diagonal is:
     * 11
     *       5
     *             -12
     * Sum across the primary diagonal: 11 + 5 - 12 = 4
     * The secondary diagonal is:
     *             4
     *       5
     * 10
     * Sum across the secondary diagonal: 4 + 5 + 10 = 19
     * Difference: |4 - 19| = 15
     */
    public function shouldCalculateTheDiagonalDifference()
    {
        $arr = [
            3,
            [
                1, 2, 3
            ],
            [
                4, 5, 6
            ],
            [
                9, 8, 9
            ]
        ];
        $diagonalDifferenceCalculator = new DiagonalDifferenceCalculator();
        $this->assertEquals(2, $diagonalDifferenceCalculator->calc($arr));
    }

    /**
     * @test
     */
    public function shouldThrowExceptionWhenTheFirstLineIsNotASingleInteger()
    {
        $arr = [
            [1,2],
            [
                1, 2, 3
            ],
            [
                4, 5, 6
            ],
            [
                9, 8, 9
            ]
        ];
        $diagonalDifferenceCalculator = new DiagonalDifferenceCalculator();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The first line of the matrix MUST be a single integer representing the size of the rows and columns');
        $diagonalDifferenceCalculator->calc($arr);
    }

    /**
     * @test
     */
    public function shouldThrowExceptionWhenTheNumberOfLinesAreDifferentThanTheFirstInteger()
    {
        $arr = [
            3,
            [
                1, 2, 3
            ],
            [
                4, 5, 6
            ]
        ];
        $diagonalDifferenceCalculator = new DiagonalDifferenceCalculator();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The Lines and Columns size should be equal than the first integer');
        $diagonalDifferenceCalculator->calc($arr);
    }

    /**
     * @test
     */
    public function shouldThrowExceptionWhenTheNumberOfColumnsAreDifferentThanTheFirstInteger()
    {
        $arr = [
            3,
            [
                1, 2, 3
            ],
            [
                4, 5
            ],
            [
                9, 8, 9
            ]
        ];
        $diagonalDifferenceCalculator = new DiagonalDifferenceCalculator();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The Lines and Columns size should be equal than the first integer');
        $diagonalDifferenceCalculator->calc($arr);
    }
}
