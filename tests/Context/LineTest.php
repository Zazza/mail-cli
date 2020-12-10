<?php
namespace App\Tests\Context;

use App\Mail\Generate;
use PHPUnit\Framework\TestCase;

class LineTest extends TestCase
{
    public function testSuccess()
    {
        $mail = new Generate('line');
        $result = $mail
            ->getContext()
            ->setTemplate('templates/lineExample.volt')
            ->setUsers([[
                'user_id' => 1,
                'email' => 'alex@mail.com',
                'age' => 67,
                'name' => 'Alex Norton'
            ]])
            ->process();

        self::assertEquals([
            'to' => 'alex@mail.com',
            'body' => 'Привет, Alex Norton. Не забудь о встрече завтра в 10:00.'
        ], $result[0]);
    }
}