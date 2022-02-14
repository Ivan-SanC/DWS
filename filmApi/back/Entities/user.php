<?php

class user
{
    public int $idUser;
    public string $mail;
    public string $password;

    /**
     * @param int $idUser
     * @param string $mail
     * @param string $password
     */
    public function __construct(int $idUser, string $mail, string $password)
    {
        $this->idUser = $idUser;
        $this->mail = $mail;
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->idUser;
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