<?php
namespace App\Exception;

class ExceptionContextRender extends \Exception
{
    public $message = 'Template not found';
}
