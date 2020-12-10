<?php
namespace App\Mail\Context;

use App\Exception\ExceptionContextRender;

/**
 * Class Line
 * @package App\Mail\Context
 */
class Line extends Context
{
    /**
     * @return array
     * @throws ExceptionContextRender
     */
    public function process(): array
    {
        try {
            foreach ($this->users as $user) {
                $output[] = Methods::parseTemplate(
                    $this->twig->render($this->template, $user)
                );
            }
        } catch (\Exception $e) {
            throw new ExceptionContextRender();
        }

        return $output;
    }
}
