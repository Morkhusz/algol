<?php

namespace App\GradingStudents;

use InvalidArgumentException;

class GradingStudents
{
    public function roundGrades($grades)
    {
        $grades = explode(PHP_EOL, $grades);
        $students = (int) array_shift($grades);
        $this->validateInput($students, $grades);

        return implode(PHP_EOL, array_map(function ($grade) {
            if ($grade < 0 || $grade > 100) {
                throw new InvalidArgumentException('Grades should be a number between 0 and 100');
            }
            $rest = $grade % 5;
            
            return ($grade > 37 && $rest > 2) ? ($grade - $rest) + 5 : $grade;
        }, $grades));
    }

    private function validateInput($students, $grades)
    {
        if ($students < 1 || $students > 60) {
            throw new InvalidArgumentException('First line should be a positive integer between 1 and 60');
        }
        if (count($grades) !== $students) {
            throw new InvalidArgumentException('The grades amount should be equal to the studens amount');
        }
    }
}
