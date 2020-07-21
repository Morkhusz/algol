<?php

namespace App\TimeConversion;

use InvalidArgumentException;

class TimeConverter
{
    public function to24Hour($time)
    {
        $modifier = substr($time, -2);
        list($hour, $min, $sec) = preg_split('/[^0-9]/', $time, -1, PREG_SPLIT_NO_EMPTY);
        $this->validate($hour, $min, $sec, $modifier);
        if ($modifier === 'AM') {
            $hour = $hour === '12' ? '00' : $hour;

            return "$hour:$min:$sec";
        }

        $hour = ($hour % 12) + 12;
        // if ($hour === '12' && $modifier === 'PM') {
        //     $hour = '12';

        //     return "$hour:$min:$sec";

        // }

        // $hour = $hour + 12;

        return "$hour:$min:$sec";
    }

    private function validate($hour, $min, $sec, $modifier)
    {
        if ($modifier !== 'AM' && $modifier !== 'PM') {
            throw new InvalidArgumentException('');
        }
        if ($hour > 12 || $hour < 0) {
            throw new InvalidArgumentException('');
        }
        if ($min > 59 || $min < 0 || $sec > 59 || $sec < 0) {
            throw new InvalidArgumentException('');
        }
    }
}
