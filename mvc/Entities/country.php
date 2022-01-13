<?php

class country
{
    protected int $idCountry;
    protected string  $nameCountry;

    /**
     * @param int $idCountry
     * @param string $nameCountry
     */
    public function __construct(int $idCountry, string $nameCountry)
    {
        $this->idCountry = $idCountry;
        $this->nameCountry = $nameCountry;
    }

    /**
     * @return int
     */
    public function getIdCountry(): int
    {
        return $this->idCountry;
    }

    /**
     * @return string
     */
    public function getNameCountry(): string
    {
        return $this->nameCountry;
    }


}