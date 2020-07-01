<?php

namespace App;

class Staircase
{
    public function print(int $size)
    {
        $staircase = '';
        for($i = 1; $i <= $size; $i++) {
            $staircase .= str_pad(str_pad('', $size - $i, ' '), $size, '#') . PHP_EOL;
        }
        
        return rtrim($staircase);
    }
}
