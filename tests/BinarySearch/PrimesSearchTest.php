<?php

namespace Tests\BinarySearch;

use PHPUnit\Framework\TestCase;

class PrimesSearchTest extends TestCase
{

    /**
     * @test
     */
    public function primes()
    {
        $primes = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97];
        $min = 0;
        $max = count($primes) -1;
        $target = 98;
        $index = $this->getTargetIndex($primes, $min, $max, $target);
        var_dump($index);
    }

    public function getTargetIndex($primes, $min, $max, $target)
    {
        if ($max < $min) {
            var_dump('PARE!!! O ALVO NÃO É PRIMO');
            return -1;
        }
        if ($primes[$min] == $target) {
            return $min;
        }
        if ($primes[$max] == $target) {
            return $max;
        }
        $guess = intval(($min + $max) / 2);
        if ($primes[$guess] == $target) {
            return $guess;
        }

        if ($primes[$guess] > $target) {
            $max = $guess - 1;

            return $this->getTargetIndex($primes, $min, $max, $target);
        }

        $min = $guess + 1;
        return $this->getTargetIndex($primes, $min, $max, $target);
    }
}
