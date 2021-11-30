<?php

include_once "author.php";
include_once "genre.php";
include_once "source.php";



class movie
{
protected int $idMovie;
protected  string  $nameMovie;
protected int $yearMovie;
protected int $durationMovie;
protected author $autorId;
protected int $ratingMovie;
protected string $description;
protected array $genres;
protected array $imgSource;
protected array $trailerSource;

    /**
     * @param int $idMovie
     * @param string $nameMovie
     * @param int $yearMovie
     * @param int $durationMovie
     * @param author $autorId
     * @param int $ratingMovie
     * @param string $description
     * @param array $genres
     * @param array $imgSource
     * @param array $trailerSource
     */
    public function __construct(int $idMovie, string $nameMovie, int $yearMovie, int $durationMovie, author $autorId,
                                int $ratingMovie, string $description, array $genres, array $imgSource, array $trailerSource)
    {
        $this->idMovie = $idMovie;
        $this->nameMovie = $nameMovie;
        $this->yearMovie = $yearMovie;
        $this->durationMovie = $durationMovie;
        $this->autorId = $autorId;
        $this->ratingMovie = $ratingMovie;
        $this->description = $description;
        $this->genres = $genres;
        $this->imgSource = $imgSource;
        $this->trailerSource = $trailerSource;
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
    public function getNameMovie(): string
    {
        return $this->nameMovie;
    }

    /**
     * @param string $nameMovie
     */
    public function setNameMovie(string $nameMovie): void
    {
        $this->nameMovie = $nameMovie;
    }

    /**
     * @return int
     */
    public function getYearMovie(): int
    {
        return $this->yearMovie;
    }

    /**
     * @param int $yearMovie
     */
    public function setYearMovie(int $yearMovie): void
    {
        $this->yearMovie = $yearMovie;
    }

    /**
     * @return int
     */
    public function getDurationMovie(): int
    {
        return $this->durationMovie;
    }

    /**
     * @param int $durationMovie
     */
    public function setDurationMovie(int $durationMovie): void
    {
        $this->durationMovie = $durationMovie;
    }

    /**
     * @return author
     */
    public function getAutorId(): author
    {
        return $this->autorId;
    }

    /**
     * @param author $autorId
     */
    public function setAutorId(author $autorId): void
    {
        $this->autorId = $autorId;
    }

    /**
     * @return int
     */
    public function getRatingMovie(): int
    {
        return $this->ratingMovie;
    }

    /**
     * @param int $ratingMovie
     */
    public function setRatingMovie(int $ratingMovie): void
    {
        $this->ratingMovie = $ratingMovie;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function getGenres(): array
    {
        return $this->genres;
    }

    /**
     * @param array $genres
     */
    public function setGenres(array $genres): void
    {
        $this->genres = $genres;
    }

    /**
     * @return array
     */
    public function getImgSource(): array
    {
        return $this->imgSource;
    }

    /**
     * @param array $imgSource
     */
    public function setImgSource(array $imgSource): void
    {
        $this->imgSource = $imgSource;
    }

    /**
     * @return array
     */
    public function getTrailerSource(): array
    {
        return $this->trailerSource;
    }

    /**
     * @param array $trailerSource
     */
    public function setTrailerSource(array $trailerSource): void
    {
        $this->trailerSource = $trailerSource;
    }




}