<?php
namespace App\Exception;

class ExceptionContextError extends \Exception
{
    public $message = 'Context must be: line | table';
}
