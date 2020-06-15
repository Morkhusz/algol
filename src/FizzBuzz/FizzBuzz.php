<?php

namespace App\FizzBuzz;

class FizzBuzz
{
    public function printFizzOnMultiplesOfThree(string $integers) : string
    {
        return implode(',', array_map(function ($int) {
            if ($int % 3 === 0) {
                return 'Fizz';
            }

            return $int;
        }, explode(',', $integers)));
    }

    public function printBuzzOnMultiplesOfFive(string $integers) : string
    {
        return implode(',', array_map(function ($integer) {
            if ($integer % 5 === 0) {
                return 'Buzz';
            }

            return $integer;
        }, explode(',', $integers)));
    }

    public function printFizzBuzzOnMultiplesOfThreeAndFive(string $integers) : string
    {
        return implode(',', array_map(function($integer) {
            if ($integer % 15 === 0) {
                return 'FizzBuzz';
            }

            return $integer;
        }, explode(',', $integers)));
    }

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