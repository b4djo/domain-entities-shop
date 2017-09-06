<?php

namespace Entities\User;

/**
 * Class User
 * @package Entities\User
 */
class User
{
    /**
     * @var UserId
     */
    private $userId;

    /**
     * @var Username
     */
    private $username;

    /**
     * @var Password
     */
    private $password;

    /**
     * @var \DateTimeImmutable
     */
    private $createDate;

    /**
     * User constructor.
     *
     * @param UserId $userId
     * @param Username $username
     * @param Password $password
     * @param \DateTimeImmutable $createDate
     */
    public function __construct(UserId $userId, Username $username, Password $password, \DateTimeImmutable $createDate)
    {
        $this->userId     = $userId;
        $this->username   = $username;
        $this->password   = $password;
        $this->createDate = $createDate;
    }

    /**
     * @return UserId
     */
    public function getUserId()/*: UserId*/
    {
        return $this->userId;
    }

    /**
     * @return Username
     */
    public function getUsername()/*: Username*/
    {
        return $this->username;
    }

    /**
     * @return Password
     */
    public function getPassword()/*: Password*/
    {
        return $this->password;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreateDate()/*: \DateTimeImmutable*/
    {
        return $this->createDate;
    }
}
