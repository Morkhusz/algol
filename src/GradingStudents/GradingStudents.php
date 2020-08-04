<?php

namespace App\GradingStudents;

use InvalidArgumentException;

class GradingStudents
{
    public function roundGrades(string $grades) : string
    {
        $grades = explode(PHP_EOL, $grades);
        $students = (int) array_shift($grades);

        if ($students < 1 || $students > 60) {
            throw new InvalidArgumentException('First line should be a positive integer between 1 and 60');
        }
        if (count($grades) !== $students) {
            throw new InvalidArgumentException('The grades amount should be equal to the studens amount');
        }
        if (min($grades) < 0 || max($grades) > 100) {
            throw new InvalidArgumentException('Grades should be a number between 0 and 100');
        }

        $roundedGrades = '';
        $students--;
        for ($i = 0; $i < $students; $i++) {
            $rest = $grades[$i] % 5;
            $roundedGrades .= ($grades[$i] > 37 && $rest > 2) ? ($grades[$i] - $rest) + 5 : $grades[$i];
            $roundedGrades .= PHP_EOL;
        }
        $rest = $grades[$students] % 5;
        $roundedGrades .= ($grades[$students] > 37 && $rest > 2) ? ($grades[$students] - $rest) + 5 : $grades[$students];

        return $roundedGrades;
    }
}
