<?php

namespace App\BDayCakeCandles;

use InvalidArgumentException;

class BirthdayCakeCandles
{
    public function blow($candles)
    {
        $candles = explode(PHP_EOL, $candles);
        if (sizeof($candles) !== 2) {
            throw new InvalidArgumentException('Input should have two lines with the candles amount and height respectively');
        }
        list($candlesQuantity, $candles) = $candles;
        $candles = explode(' ', $candles);
        $this->validate($candlesQuantity, $candles);
        $counter = 0;
        array_reduce($candles, function ($accumulator, $item) use (&$counter) {
            if ($accumulator === null || $item > $accumulator) {
                $accumulator = $item;
                $counter = 1;

                return $accumulator;
            }
            if ($item < $accumulator) {
                return $accumulator;
            }
            ++$counter;

            return $accumulator;
        });

        return $counter;
    }

    private function validate($candlesQuantity, $candles)
    {
        if ($candlesQuantity < 0) {
            throw new InvalidArgumentException('First line should be a positive integer');
        }
        if (count($candles) != $candlesQuantity) {
            throw new InvalidArgumentException('The size is different from the first line integer');
        }
    }
}
