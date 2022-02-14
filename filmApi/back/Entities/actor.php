<?php

class actor
{
    public int $idActor;
    public string $nameActor;
    public string $lastnameActor;

    /**
     * @param int $idActor
     * @param string $nameActor
     * @param string $lastnameActor
     */
    public function __construct(int $idActor, string $nameActor, string $lastnameActor)
    {
        $this->idActor = $idActor;
        $this->nameActor = $nameActor;
        $this->lastnameActor = $lastnameActor;
    }

    /**
     * @return int
     */
    public function getIdActor(): int
    {
        return $this->idActor;
    }

    /**
     * @return string
     */
    public function getNameActor(): string
    {
        return $this->nameActor;
    }

    /**
     * @return string
     */
    public function getLastnameActor(): string
    {
        return $this->lastnameActor;
    }


}