<?php

namespace App\FizzBuzz;

use InvalidArgumentException;

class FizzBuzz
{
    public function fizzBuzz(int $start, int $end) : string
    {
        if ($start > $end) {
            throw new InvalidArgumentException('The ending number MUST be greater than the starting number');
        }
        if ($start < 0 || $end < 0) {
            throw new InvalidArgumentException('Negative numbers are not allowed');
        }
        $fizzBuzz = '';
        for ($start; $start <= $end; $start++) {
            $returnValue = '';
            if ($start % 3 === 0) {
                $returnValue .= 'Fizz';
            }
            if ($start % 5 === 0) {
                $returnValue .= 'Buzz';
            }
            if ($returnValue == '') {
                $returnValue = $start;
            }

            $fizzBuzz .= $returnValue . PHP_EOL;
        }

        return $fizzBuzz;
    }
}