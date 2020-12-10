<?php
namespace App\Command;

use App\Mail\Generate;
use App\Mail\Mail;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MailCommand extends Command
{
    protected static $defaultName = 'app:mail';

    private $users = [
        [
            'user_id' => 1,
            'email' => 'alex@mail.com',
            'age' => 67,
            'name' => 'Alex Norton'
        ],
        [
            'user_id' => 2,
            'email' => 'mary@gmail.com',
            'age' => 18,
            'name' => 'Marry Shawn'
        ],
        [
            'user_id' => 3,
            'email' => 'dan@ya.ru',
            'age' => 34,
            'name' => 'Dan Hoff'
        ],
        [
            'user_id' => 1,
            'email' => 'alex@mail.com',
            'age' => 67,
            'name' => 'Alex Norton'
        ],
    ];

    protected function configure()
    {
        $this
            ->setDescription('Generate mails');

        $this
            ->addArgument('context', InputArgument::REQUIRED, 'Context: line|table')
            ->addArgument('template', InputArgument::REQUIRED, 'Template path');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $contextFabric = new Generate($input->getArgument('context'));
        $mailer = new Mail();

        try {
            $messages = $contextFabric
                ->getContext()
                ->setTemplate($input->getArgument('template'))
                ->setUsers($this->users)
                ->process();

            $result = $mailer->processMessages($messages);

            $output->writeln($result);

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());

            return Command::FAILURE;
        }
    }
}