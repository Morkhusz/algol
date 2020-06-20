<?php

namespace App;

class Staircase
{
    public function print(int $size)
    {
        $staircase = [];
        for($i = 1; $i <= $size; $i++) {
            $staircase[$i] = str_pad(str_pad('', $size - $i, ' '), $size, '#');
        }
        
        return implode(PHP_EOL, $staircase);
    }
}