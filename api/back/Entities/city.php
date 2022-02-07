<?php

class city
{
    public int $idCity;
    public string  $nameCity;


    /**
     * @param int $idCity
     * @param string $nameCity
     */
    public function __construct(int $idCity, string $nameCity)
    {
        $this->idCity = $idCity;
        $this->nameCity = $nameCity;
    }


    /**
     * @return int
     */
    public function getIdCity(): int
    {
        return $this->idCity;
    }

    /**
     * @return string
     */
    public function getNameCity(): string
    {
        return $this->nameCity;
    }

}