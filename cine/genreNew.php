<?php

class genreNew
{
    protected int $idGenre;
    protected string $nameGenre;

    /**
     * @param int $idGenre
     * @param string $nameGenre
     */
    public function __construct(int $idGenre, string $nameGenre)
    {
        $this->idGenre = $idGenre;
        $this->nameGenre = $nameGenre;
    }

    /**
     * @return int
     */
    public function getIdGenre(): int
    {
        return $this->idGenre;
    }

    /**
     * @return string
     */
    public function getNameGenre(): string
    {
        return $this->nameGenre;
    }




}