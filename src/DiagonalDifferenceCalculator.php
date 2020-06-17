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
        if (!is_numeric($arr[0])) {
            throw new InvalidArgumentException(
                'The first line of the matrix MUST be a single integer representing the size of the rows and columns'
            );
        }
        if ((count($arr) - 1) !== $arr[0] ) {
            throw new InvalidArgumentException(
                'The Lines and Columns size should be equal than the first integer'
            );
        }
        $firstDiagonalSum = 0;
        $secondDiagonalSum = 0;
        $firstDiagonalLine = 1;
        $firstDiagonalCol = 0;
        $secondDiagonalLine = 1;
        $secondDiagonalCol =  $arr[0] - 1;
        for ($line = 1; $line <= $arr[0]; $line++) {
            for ($col = 0; $col < $arr[0]; $col++) {
                if ($line === $firstDiagonalLine && $col === $firstDiagonalCol) {
                    $firstDiagonalSum += $arr[$line][$col];
                    $firstDiagonalCol++;
                    $firstDiagonalLine++;
                }
                if ($line === $secondDiagonalLine && $col === $secondDiagonalCol) {
                    if (count($arr[$line]) !== $arr[0]) {
                        throw new InvalidArgumentException(
                            'The Lines and Columns size should be equal than the first integer'
                        );
                    }
                    $secondDiagonalSum += $arr[$line][$col];
                    $secondDiagonalCol--;
                    $secondDiagonalLine++;
                }
            }
        }
        if ($firstDiagonalSum - $secondDiagonalSum < 0) {
            return $secondDiagonalSum - $firstDiagonalSum;
        }

        return $firstDiagonalSum - $secondDiagonalSum;
    }
}