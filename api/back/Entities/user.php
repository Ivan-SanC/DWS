<?php
class user
{
    public int $idUser;
    public string $nameUser;
    public string $passUser;
    public string $email;

    /**
     * @param int $idUser
     * @param string $nameUser
     * @param string $passUser
     * @param string $email
     */
    public function __construct(int $idUser, string $nameUser, string $passUser, string $email)
    {
        $this->idUser = $idUser;
        $this->nameUser = $nameUser;
        $this->passUser = $passUser;
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return string
     */
    public function getNameUser(): string
    {
        return $this->nameUser;
    }

    /**
     * @param string $nameUser
     */
    public function setNameUser(string $nameUser): void
    {
        $this->nameUser = $nameUser;
    }

    /**
     * @return string
     */
    public function getPassUser(): string
    {
        return $this->passUser;
    }

    /**
     * @param string $passUser
     */
    public function setPassUser(string $passUser): void
    {
        $this->passUser = $passUser;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


}