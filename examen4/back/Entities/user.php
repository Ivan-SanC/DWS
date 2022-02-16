<?php

class user
{
    public int $idUser;
    public string $mail;
    public string $pass;

    /**
     * @param int $idUser
     * @param string $mail
     * @param string $pass
     */
    public function __construct(int $idUser, string $mail, string $pass)
    {
        $this->idUser = $idUser;
        $this->mail = $mail;
        $this->pass = $pass;
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
    public function getPass(): string
    {
        return $this->pass;
    }


}