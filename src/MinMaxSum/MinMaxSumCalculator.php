<?php

namespace App\MinMaxSum;

use InvalidArgumentException;

class MinMaxSumCalculator
{
    public function calculate(string $integers)
    {
        $numbersFound = 0;
        $number = null;
        $min = 0;
        $max = 0;
        $sum = 0;
        for ($i = 0; $i < strlen($integers); $i++) {
            if ($integers[$i] == ' ') continue;
            if (isset($integers[$i + 1]) && $integers[$i + 1] !== ' ') {
                $number .= $integers[$i];
                continue;
            }
            ++$numbersFound;
            $number .= $integers[$i];
            $sum += $number;
            $min = ($min == 0 || $number < $min) ? $number : $min;
            $max = ($max == 0 || $number > $max) ? $number : $max;
            if ($number < 0) {
                throw new InvalidArgumentException('Argument should not contain negative numbers');
            }
            $number = null;
        }
        if ($numbersFound !== 5) {
            throw new InvalidArgumentException('Argument should be a sequence of five space separeted integers');
        }

        return ($sum - $max) . " " . ($sum - $min);
    }
}
