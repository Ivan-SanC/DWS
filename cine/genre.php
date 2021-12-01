<?php
include_once "movie.php";

class genre
{
    protected int $idGenre;
    protected int $idMovie;
    protected string $nameGenre;

    /**
     * @param int $idGenre
     * @param int $idMovie
     * @param string $nameGenre
     */
    public function __construct(int $idGenre, int $idMovie, string $nameGenre)
    {
        $this->idGenre = $idGenre;
        $this->idMovie = $idMovie;
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
     * @param int $idGenre
     */
    public function setIdGenre(int $idGenre): void
    {
        $this->idGenre = $idGenre;
    }

    /**
     * @return int
     */
    public function getIdMovie(): int
    {
        return $this->idMovie;
    }

    /**
     * @param int $idMovie
     */
    public function setIdMovie(int $idMovie): void
    {
        $this->idMovie = $idMovie;
    }

    /**
     * @return string
     */
    public function getNameGenre(): string
    {
        return $this->nameGenre;
    }

    /**
     * @param string $nameGenre
     */
    public function setNameGenre(string $nameGenre): void
    {
        $this->nameGenre = $nameGenre;
    }


}