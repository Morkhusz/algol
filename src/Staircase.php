<?php

namespace App;

use InvalidArgumentException;

class Staircase
{
    public function print(int $size)
    {
        if ($size < 0 || $size > 100) {
            throw new InvalidArgumentException('The size should be greater than 0 and lesser than 100');
        }

        $staircase = '';
        for($i = 1; $i < $size; $i++) {
            $staircase .= str_pad(str_pad('', $size - $i, ' '), $size, '#') . PHP_EOL;
        }
        
        return $staircase .= str_pad(str_pad('', $size - $size, ' '), $size, '#');
    }
}
