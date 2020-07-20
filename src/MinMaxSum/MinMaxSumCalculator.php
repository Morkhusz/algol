<?php

namespace App\MinMaxSum;

use InvalidArgumentException;

class MinMaxSumCalculator
{
    public function calculate(string $integers)
    {
        $integers = explode(' ', $integers);
        sort($integers);
        if (sizeof($integers) !== 5) {
            throw new InvalidArgumentException('Argument should be a sequence of five space separeted integers');
        }
        if ($integers[0] < 0) {
            throw new InvalidArgumentException('Argument should not contain negative numbers');
        }
        $sum = array_sum($integers);

        return ($sum - $integers[4]) . " " . ($sum - $integers[0]);
    }
}
