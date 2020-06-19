<?php

namespace App;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class PlusMinus
{
    public function calculate(array $numbers) : array
    {
        if (!isset($numbers[1]) || !is_array($numbers[1])) {
            throw new InvalidArgumentException('The second array line MUST be another array');
        }
        if (count($numbers[1]) < $numbers[0]) {
            throw new InvalidArgumentException('The size of the elements should be equal to the integer on the first line');
        }
        $fractions = [
            0,0,0
        ];
        foreach($numbers[1] as $number) {
            if ($number > 0) {
                $fractions[0] = bcadd($fractions[0], bcdiv(1, $numbers[0], 6), 6);
                continue;
            }
            if($number < 0) {
                $fractions[1] = bcadd($fractions[1], bcdiv(1, $numbers[0], 6), 6);
                continue;
            }

            $fractions[2] = bcadd($fractions[2], bcdiv(1, $numbers[0], 6), 6);
        }

        return $fractions;
    }
}