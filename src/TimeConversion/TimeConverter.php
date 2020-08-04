<?php

namespace App\TimeConversion;

use InvalidArgumentException;

class TimeConverter
{
    public function to24Hour($time)
    {
        
        $modifier = substr($time, -2);
        list($hour, $min, $sec) = preg_split('/[^0-9]/', $time, -1, PREG_SPLIT_NO_EMPTY);
        if ($modifier !== 'AM' && $modifier !== 'PM') {
            throw new InvalidArgumentException('The last two chars of the string should be the time modifier AM or PM');
        }
        if ($hour > 12 || $hour < 1) {
            throw new InvalidArgumentException('Hour should be between 1 and 12');
        }
        if ($min > 59 || $min < 0 || $sec > 59 || $sec < 0) {
            throw new InvalidArgumentException('Minutes and Seconds should be between 0 and 59');
        }
        if ($modifier === 'AM') {
            $hour = $hour === '12' ? '00' : $hour;

            return "{$hour}:{$min}:{$sec}";
        }
        $hour = ($hour % 12) + 12;

        return "{$hour}:{$min}:{$sec}";
    }
}
