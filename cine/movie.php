<?php
include_once "author.php";
include_once "genre.php";


class movie
{
    protected int $idMovie;
    protected  string  $nameMovie;
    protected int $yearMovie;
    protected int $durationMovie;
    protected author $idAuthor;
    protected int $ratingMovie;
    protected string $description;
    protected array $genres;
    protected string $imgSource;
    protected string $trailerSource;

    /**
     * @param int $idMovie
     * @param string $nameMovie
     * @param int $yearMovie
     * @param int $durationMovie
     * @param author $idAuthor
     * @param int $ratingMovie
     * @param string $description
     * @param array $genres
     * @param array $imgSource
     * @param array $trailerSource
     */
    public function __construct(int $idMovie, string $nameMovie, int $yearMovie, int $durationMovie, author $idAuthor,
                                int $ratingMovie, string $description, array $genres, string $imgSource, string $trailerSource)
    {
        $this->idMovie = $idMovie;
        $this->nameMovie = $nameMovie;
        $this->yearMovie = $yearMovie;
        $this->durationMovie = $durationMovie;
        $this->idAuthor = $idAuthor;
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
    public function getIdAuthor(): author
    {
        return $this->idAuthor;
    }

    /**
     * @param author $idAuthor
     */
    public function setAutorId(author $idAuthor): void
    {
        $this->idAuthor = $idAuthor;
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