<?php

namespace App;

use InvalidArgumentException;

class DiagonalDifferenceCalculator
{
    /**
     * @param Array $arr the array containing the 2D matrix
     * to calculate the diagonal difference
     * @return Integer the difference of the two diagonals
     */
    public function calc(array $arr) : int
    {
        $lineAndColumnCount = array_shift($arr);

        if (!is_numeric($lineAndColumnCount)) {
            throw new InvalidArgumentException(
                'The first line of the matrix MUST be a single integer representing the size of the rows and columns'
            );
        }
        if (sizeof($arr) !== $lineAndColumnCount ) {
            throw new InvalidArgumentException(
                'The Lines and Columns size should be equal than the first integer'
            );
        }
        $firstDiagonalSum = 0;
        $secondDiagonalSum = 0;
        for ($i = 0; $i < $lineAndColumnCount; $i++) {
            if (sizeof($arr[$i]) !== $lineAndColumnCount) {
                throw new InvalidArgumentException(
                    'The Lines and Columns size should be equal than the first integer'
                );
            }
            $firstDiagonalSum += $arr[$i][($i - $lineAndColumnCount) + $lineAndColumnCount];
            $secondDiagonalSum += $arr[$i][($lineAndColumnCount - 1) - $i];
        }

        return abs($firstDiagonalSum - $secondDiagonalSum);
    }
}