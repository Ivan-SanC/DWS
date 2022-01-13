<?php

class state
{
    protected int $idState;
    protected string  $nameState;

    /**
     * @param int $idState
     * @param string $nameState
     */
    public function __construct(int $idState, string $nameState)
    {
        $this->idState = $idState;
        $this->nameState = $nameState;
    }

    /**
     * @return int
     */
    public function getIdState(): int
    {
        return $this->idState;
    }

    /**
     * @return string
     */
    public function getNameState(): string
    {
        return $this->nameState;
    }


}