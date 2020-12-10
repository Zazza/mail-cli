<?php
namespace App\Mail\Context;

use App\Exception\ExceptionContextRender;

/**
 * Class Table
 * @package App\Mail\Context
 */
class Table extends Context
{
    /**
     * @return array
     * @throws ExceptionContextRender
     */
    public function process(): array
    {
        $usersId = [];
        $usersEmail = [];
        $usersAge = [];
        $usersName = [];
        $usersInTable = [];
        foreach ($this->users as $user) {
            $usersId[] = $user['user_id'];
            $usersEmail[] = $user['email'];
            $usersAge[] = $user['age'];
            $usersName[] = $user['name'];
        }
        $usersInTable['user_id'] = implode(', ', $usersId);
        $usersInTable['email'] = implode(', ', $usersEmail);
        $usersInTable['age'] = implode(', ', $usersAge);
        $usersInTable['name'] = implode(', ', $usersName);

        try {
            $output[] = $this->twig->render($this->template, $usersInTable);
        } catch (\Exception $e) {
            throw new ExceptionContextRender();
        }

        return $output;
    }
}
