<?php
namespace App\Mail\Context;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * Class Context
 * @package App\Mail\Context
 */
class Context
{
    /**
     * @var Environment
     */
    protected $twig;

    /**
     * @var string
     */
    protected $template;

    /**
     * @var array
     */
    protected $users;

    public function __construct()
    {
        $loader = new FilesystemLoader('.');
        $this->twig = new Environment($loader, []);
    }

    public function setTemplate(string $template): self
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @param array $users
     */
    public function setUsers(array $users): self
    {
        foreach ($users as $user) {
            $this->users[$user['user_id']] = $user;
        }

        return $this;
    }
}
