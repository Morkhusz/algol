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
        $firstDiagonalIndex = 0;
        $firstDiagonalCol = 0;
        $secondDiagonalIndex = 0;
        $secondDiagonalCol = $lineAndColumnCount - 1;
        foreach ($arr as $line => $columns) {
            if (sizeof($arr[$line]) !== $lineAndColumnCount) {
                throw new InvalidArgumentException(
                    'The Lines and Columns size should be equal than the first integer'
                );
            }
            if ($line === $firstDiagonalIndex) {
                $firstDiagonalSum += $columns[$firstDiagonalCol];
                $firstDiagonalCol++;
                $firstDiagonalIndex++;
            }
            if ($line === $secondDiagonalIndex) {
                $secondDiagonalSum += $columns[$secondDiagonalCol];
                $secondDiagonalCol--;
                $secondDiagonalIndex++;
            }
        }

        return abs($firstDiagonalSum - $secondDiagonalSum);
    }
}