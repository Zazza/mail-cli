<?php
namespace App\Tests\Context;

use App\Mail\Mail;
use PHPUnit\Framework\TestCase;

class MailTest extends TestCase
{
    public function testProcessMessages()
    {
        $mail = new Mail();
        $emails = $mail->processMessages([['to' => 'email@example.com', 'body' => 'Text']]);

        self::assertInstanceOf(\Swift_Message::class, $emails[0]);

        self::assertEquals($emails[0]->getTo(), ['email@example.com' => null]);
        self::assertEquals($emails[0]->getBody(), 'Text');
    }
}