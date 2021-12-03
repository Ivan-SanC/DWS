<?php
include_once "author.php";
include_once "genre.php";


class movie
{
    protected int $idMovie;
    protected string $nameMovie;
    protected int $yearMovie;
    protected int $durationMovie;
    protected author $author;
    protected int $ratingMovie;
    protected string $description;
    protected array $genres;
    protected string $imgMovie;
    protected string $trailerMovie;

    /**
     * @param int $idMovie
     * @param string $nameMovie
     * @param int $yearMovie
     * @param int $durationMovie
     * @param author $author
     * @param int $ratingMovie
     * @param string $description
     * @param array $genres
     * @param string $imgMovie
     * @param string $trailerMovie
     */
    public function __construct(int $idMovie, string $nameMovie, int $yearMovie, int $durationMovie, author $author, int $ratingMovie, string $description, array $genres, string $imgMovie, string $trailerMovie)
    {
        $this->idMovie = $idMovie;
        $this->nameMovie = $nameMovie;
        $this->yearMovie = $yearMovie;
        $this->durationMovie = $durationMovie;
        $this->author = $author;
        $this->ratingMovie = $ratingMovie;
        $this->description = $description;
        $this->genres = $genres;
        $this->imgMovie = $imgMovie;
        $this->trailerMovie = $trailerMovie;
    }

    /**
     * @return int
     */
    public function getIdMovie(): int
    {
        return $this->idMovie;
    }

    /**
     * @return string
     */
    public function getNameMovie(): string
    {
        return $this->nameMovie;
    }

    /**
     * @return int
     */
    public function getYearMovie(): int
    {
        return $this->yearMovie;
    }

    /**
     * @return int
     */
    public function getDurationMovie(): int
    {
        return $this->durationMovie;
    }

    /**
     * @return author
     */
    public function getAuthor(): author
    {
        return $this->author;
    }

    /**
     * @return int
     */
    public function getRatingMovie(): int
    {
        return $this->ratingMovie;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return array
     */
    public function getGenres(): array
    {
        return $this->genres;
    }

    /**
     * @return string
     */
    public function getImgMovie(): string
    {
        return $this->imgMovie;
    }

    /**
     * @return string
     */
    public function getTrailerMovie(): string
    {
        return $this->trailerMovie;
    }


}