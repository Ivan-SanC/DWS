<?php
include_once "movie.php";

class source
{
protected int $idSource;
protected movie $idMovie;
protected string $imgSource;
protected string $trailerSource;

    /**
     * @param int $idSource
     * @param movie $idMovie
     * @param string $imgSource
     * @param string $trailerSource
     */
    public function __construct(int $idSource, movie $idMovie, string $imgSource, string $trailerSource)
    {
        $this->idSource = $idSource;
        $this->idMovie = $idMovie;
        $this->imgSource = $imgSource;
        $this->trailerSource = $trailerSource;
    }

    /**
     * @return int
     */
    public function getIdSource(): int
    {
        return $this->idSource;
    }

    /**
     * @param int $idSource
     */
    public function setIdSource(int $idSource): void
    {
        $this->idSource = $idSource;
    }

    /**
     * @return movie
     */
    public function getIdMovie(): movie
    {
        return $this->idMovie;
    }

    /**
     * @param movie $idMovie
     */
    public function setIdMovie(movie $idMovie): void
    {
        $this->idMovie = $idMovie;
    }

    /**
     * @return string
     */
    public function getImgSource(): string
    {
        return $this->imgSource;
    }

    /**
     * @param string $imgSource
     */
    public function setImgSource(string $imgSource): void
    {
        $this->imgSource = $imgSource;
    }

    /**
     * @return string
     */
    public function getTrailerSource(): string
    {
        return $this->trailerSource;
    }

    /**
     * @param string $trailerSource
     */
    public function setTrailerSource(string $trailerSource): void
    {
        $this->trailerSource = $trailerSource;
    }




}