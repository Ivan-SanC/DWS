<?php

class user
{
    protected  string  $nameUser;
    protected  string  $passUser;
    protected  string  $emailUser;

    /**
     * @param string $nameUser
     * @param string $passUser
     * @param string $emailUser
     */
    public function __construct(string $nameUser, string $passUser, string $emailUser)
    {
        $this->nameUser = $nameUser;
        $this->passUser = $passUser;
        $this->emailUser = $emailUser;
    }

    /**
     * @return string
     */
    public function getNameUser(): string
    {
        return $this->nameUser;
    }

    /**
     * @return string
     */
    public function getPassUser(): string
    {
        return $this->passUser;
    }

    /**
     * @return string
     */
    public function getEmailUser(): string
    {
        return $this->emailUser;
    }


}