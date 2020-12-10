<?php
namespace App\Tests\Context;

use App\Mail\Generate;
use PHPUnit\Framework\TestCase;

class TableTest extends TestCase
{
    public function testSuccess()
    {
        $mail = new Generate('table');
        $result = $mail
            ->getContext()
            ->setTemplate('templates/tableExample.volt')
            ->setUsers([[
                'user_id' => 1,
                'email' => 'alex@mail.com',
                'age' => 67,
                'name' => 'Alex Norton'
            ]])
            ->process();

        self::assertEquals([
            'to' => 'admin@admin.ru',
            'body' => 'Отчет за сегодня. В системе зарегистрировались: Alex Norton. Их возраст соответственно: 67. А вот их адреса: alex@mail.com.'
        ], $result[0]);
    }
}
