<?php

class location
{
    public int $idLocation;
    public string $nameLocation;
    public string $type;
    public string $dimension;

    /**
     * @param int $idLocation
     * @param string $nameLocation
     * @param string $type
     * @param string $dimension
     */
    public function __construct(int $idLocation, string $nameLocation, string $type, string $dimension)
    {
        $this->idLocation = $idLocation;
        $this->nameLocation = $nameLocation;
        $this->type = $type;
        $this->dimension = $dimension;
    }

    /**
     * @return int
     */
    public function getIdLocation(): int
    {
        return $this->idLocation;
    }

    /**
     * @return string
     */
    public function getNameLocation(): string
    {
        return $this->nameLocation;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getDimension(): string
    {
        return $this->dimension;
    }

}