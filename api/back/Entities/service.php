<?php
class service
{
    public int $idService;
    public string $nameService;

    /**
     * @param int $idService
     * @param string $nameService
     */
    public function __construct(int $idService, string $nameService)
    {
        $this->idService = $idService;
        $this->nameService = $nameService;
    }

    /**
     * @return int
     */
    public function getIdService(): int
    {
        return $this->idService;
    }

    /**
     * @return string
     */
    public function getNameService(): string
    {
        return $this->nameService;
    }


}