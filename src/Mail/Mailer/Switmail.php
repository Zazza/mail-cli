<?php
namespace App\Mail\Mailer;

class Switmail
{
    const FROM_MAIL = 'example@example.com';
    const FROM_NAME = 'Example';

    public function __construct()
    {
        $transport = (new \Swift_SmtpTransport('smtp.example.org', 25))
            ->setUsername('your username')
            ->setPassword('your password');

        $mailer = new \Swift_Mailer($transport);
    }

    public function generate(string $email, string $message): \Swift_Message
    {
        return (new \Swift_Message(''))
            ->setFrom([self::FROM_MAIL => self::FROM_NAME])
            ->setTo($email)
            ->setBody($message);
    }
}