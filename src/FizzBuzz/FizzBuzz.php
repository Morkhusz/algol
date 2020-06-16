<?php

namespace App\FizzBuzz;

class FizzBuzz
{
    public function fizzBuzz(string $integers) : string
    {
        $this->stringContainsOnlyCommaSeparatedIntegers($integers);

        return implode(',', array_map(function($integer) {
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

    /**
     * @return true if passed string contains only comma separated integers
     * @throws InvalidStringException
     */
    private function stringContainsOnlyCommaSeparatedIntegers(string $string) : bool
    {
        foreach (explode(',', $string) as $item) {
            if (!is_numeric($item)) {
                throw new InvalidStringException();
            }
        }

        return true;
    }
}