<?php

namespace App\FizzBuzz;

use Exception;

class InvalidStringException extends Exception
{
    public function __construct()
    {
        parent::__construct('String must contain comma separated integers only');
    }
}