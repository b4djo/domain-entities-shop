<?php

namespace Entities\User;

use PHPassLib\Hash\BCrypt;

/**
 * Class Password
 * @package Entities\User
 */
class Password
{
    /**
     * @var string
     */
    private $password;

    /**
     * Password constructor.
     *
     * @param string $password
     */
    public function __construct(string $password)
    {
        $hash = BCrypt::hash($password);
        $this->password = $hash;
    }

    /**
     * @return string
     */
    public function getPassword()/*: string*/
    {
        return $this->password;
    }
}
