<?php
namespace App\Mail;

use App\Mail\Mailer\Switmail;

class Mail
{
    private $mailer;

    public function __construct()
    {
        $this->mailer = new Switmail();
    }

    /**
     * @param array $messages
     * @return array
     */
    public function processMessages(array $messages): array
    {
        $mail = [];

        foreach ($messages as $message) {
            $mail[] = $this->mailer->generate(
                $message['to'],
                $message['body']
            );
        }

        return $mail;
    }
}
