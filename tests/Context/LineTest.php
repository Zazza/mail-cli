<?php
namespace App\Tests\Context;

use App\Exception\ExceptionContextRender;
use App\Mail\Generate;
use PHPUnit\Framework\TestCase;

class LineTest extends TestCase
{
    public function testSuccess()
    {
        $mail = new Generate('line');
        $result = $mail
            ->getContext()
            ->setTemplate('templates/lineExample.twig')
            ->setUsers([[
                'user_id' => 1,
                'email' => 'alex@mail.com',
                'age' => 67,
                'name' => 'Alex Norton'
            ]])
            ->process();

        $this->assertEquals([
            'To: alex@mail.com'."\n"
            .'Body: Привет, Alex Norton. Не забудь о встрече завтра в 10:00.'
            ."\n"], $result);
    }
}