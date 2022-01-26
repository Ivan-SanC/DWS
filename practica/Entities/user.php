<?php

class user
{
    protected int $id;
    protected string  $mail;
    protected string $password;

    /**
     * @param int $id
     * @param string $mail
     * @param string $password
     */
    public function __construct(int $id, string $mail, string $password)
    {
        $this->id = $id;
        $this->mail = $mail;
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }


}