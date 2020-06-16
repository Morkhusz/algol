<?php

namespace App\FizzBuzz;

class FizzBuzz
{
    public function fizzBuzz(string $integers) : string
    {
        return implode(',', array_map(function($integer) {
            if (!is_numeric($integer)) {
                throw new InvalidStringException();
            }

            if ($integer % 15 === 0) {
                return 'FizzBuzz';
            }

            if ($integer % 3 === 0) {
                return 'Fizz';
            }

            if ($integer % 5 === 0) {
                return 'Buzz';
            }

            return $integer;
        }, explode(',', $integers)));
    }
}