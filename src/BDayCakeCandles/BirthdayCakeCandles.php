<?php

namespace App\BDayCakeCandles;

use InvalidArgumentException;

class BirthdayCakeCandles
{
    public function blow($candles)
    {
        $candles = explode(PHP_EOL, $candles);
        if (count($candles) !== 2) {
            throw new InvalidArgumentException('Input should have two lines with the candles amount and height respectively');
        }
        list($candlesQuantity, $candles) = $candles;
        if ($candlesQuantity < 0) {
            throw new InvalidArgumentException('First line should be a positive integer');
        }
        $counter = 0;
        $accumulator = 0;
        $candle = 0;
        $candlesPresent = 0;
        for($i = 0; $i < strlen($candles); $i++) {
            if ($candles[$i] === ' ') {
                $candle = 0;

                continue;
            }
            $candle .= $candles[$i];
            if (isset($candles[$i + 1]) && $candles[$i + 1] !== ' ') {
                continue;
            }
            ++$candlesPresent;

            if ($candle > $accumulator) {
                $accumulator = $candle;
                $counter = 1;

                continue;
            }

            if ($candle === $accumulator) {
                ++$counter;

                continue;
            }
        }

        if ($candlesQuantity != $candlesPresent) {
            throw new InvalidArgumentException('The size is different from the first line integer');
        }

        return $counter;
    }
}
