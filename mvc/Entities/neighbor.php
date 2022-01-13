<?php

class neighbor
{
    protected int $idNeighbor;
    protected string $nameNeighbor;
    protected int   $zip;

    /**
     * @param int $idNeighbor
     * @param string $nameNeighbor
     * @param int $zip
     */
    public function __construct(int $idNeighbor, string $nameNeighbor, int $zip)
    {
        $this->idNeighbor = $idNeighbor;
        $this->nameNeighbor = $nameNeighbor;
        $this->zip = $zip;
    }

    /**
     * @return int
     */
    public function getIdNeighbor(): int
    {
        return $this->idNeighbor;
    }

    /**
     * @return string
     */
    public function getNameNeighbor(): string
    {
        return $this->nameNeighbor;
    }

    /**
     * @return int
     */
    public function getZip(): int
    {
        return $this->zip;
    }




}