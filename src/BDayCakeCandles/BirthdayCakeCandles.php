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

        return array_reduce($candles, function ($accumulator, $item) {
            if ($accumulator === null || $item > $accumulator['item']) {
                $accumulator['item'] = $item;
                $accumulator['counter'] = 1;

                return $accumulator;
            }

            if ($item < $accumulator['item']) {
                return $accumulator;
            }

            ++$accumulator['counter'];

            return $accumulator;
        })['counter'];
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
