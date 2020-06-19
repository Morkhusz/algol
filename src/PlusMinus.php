<?php

namespace App;

use InvalidArgumentException;

class PlusMinus
{
    public function calculate(array $numbers) : array
    {
        $size = array_shift($numbers);
        $numbers = array_shift($numbers);

        if (!is_array($numbers) || empty($numbers)) {
            throw new InvalidArgumentException('The second array line MUST be another array with the size of the integer on the first line');
        }
        if (sizeof($numbers) < $size) {
            throw new InvalidArgumentException('The size of the elements should be equal to the integer on the first line');
        }
        $fractions = [
            0,0,0
        ];
        foreach($numbers as $number) {
            if ($number > 0) {
                $fractions[0] = bcadd($fractions[0], bcdiv(1, $size, 6), 6);
                continue;
            }
            if($number < 0) {
                $fractions[1] = bcadd($fractions[1], bcdiv(1, $size, 6), 6);
                continue;
            }

            $fractions[2] = bcadd($fractions[2], bcdiv(1, $size, 6), 6);
        }

        return $fractions;
    }
}