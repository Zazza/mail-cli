<?php
namespace App\Mail\Context;

/**
 * Class Methods
 * @package App\Mail\Context
 */
class Methods
{
    const STRUCTURE_TO = 'TO: ';
    const STRUCTURE_BODY = 'BODY: ';

    /**
     * @param string $render
     * @return array
     */
    public static function parseTemplate(string $render): array
    {
        $firstString = strtok($render, "\n");

        return [
            'to' => substr(
                $firstString,
                strlen(self::STRUCTURE_TO)
            ),
            'body' => trim(substr(
                $render,
                strlen($firstString) + strlen(self::STRUCTURE_BODY)
            ))
        ];
    }
}
