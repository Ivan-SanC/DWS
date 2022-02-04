<?php
class neighbor
{
    public int $idNeighbor;
    public string $nameNeighbor;
    public string $zip;

    /**
     * @param int $idNeighbor
     * @param string $nameNeighbor
     * @param string $zip
     */
    public function __construct(int $idNeighbor, string $nameNeighbor, string $zip)
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
     * @return string
     */
    public function getZip(): string
    {
        return $this->zip;
    }


}