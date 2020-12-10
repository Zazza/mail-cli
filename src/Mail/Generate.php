<?php
namespace App\Mail;

use App\Exception\ExceptionContextError;
use App\Mail\Context\Context as ContextInterface;
use App\Mail\Context\Line;
use App\Mail\Context\Table;

/**
 * Class Generate
 * @package App\Mail
 */
class Generate
{
    const CONTEXT_LINE = 'line';
    const CONTEXT_TABLE = 'table';

    /**
     * @var ContextInterface
     */
    private $context;

    /**
     * @param string $context
     * @throws ExceptionContextError
     */
    public function __construct(string $context)
    {
        switch ($context) {
            case self::CONTEXT_LINE:
                $this->context = new Line();
                break;
            case self::CONTEXT_TABLE:
                $this->context = new Table();
                break;
            default:
                throw new ExceptionContextError();
        }
    }

    /**
     * @return ContextInterface
     */
    public function getContext(): ContextInterface
    {
        return $this->context;
    }
}
