<?php
namespace App\Tests\Context;

use App\Exception\ExceptionContextError;
use App\Exception\ExceptionContextRender;
use App\Mail\Generate;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase
{
    public function testFalseRender()
    {
        $this->expectException(ExceptionContextRender::class);

        $mail = new Generate('line');
        $result = $mail
            ->getContext()
            ->setTemplate('templates/unknown.volt')
            ->setUsers([[
                'user_id' => 1,
                'email' => 'alex@mail.com',
                'age' => 67,
                'name' => 'Alex Norton'
            ]])
            ->process();
    }

    public function testFalseUnkownContext()
    {
        $this->expectException(ExceptionContextError::class);

        $mail = new Generate('circle');
        $result = $mail
            ->getContext()
            ->setTemplate('templates/unknown.volt')
            ->setUsers([[
                'user_id' => 1,
                'email' => 'alex@mail.com',
                'age' => 67,
                'name' => 'Alex Norton'
            ]])
            ->process();
    }
}