<?php


class author
{
    protected  int $idAuthor;
    protected  string  $nameAuthor;

    /**
     * @param int $idAuthor
     * @param string $nameAuthor
     */
    public function __construct(int $idAuthor, string $nameAuthor)
    {
        $this->idAuthor = $idAuthor;
        $this->nameAuthor = $nameAuthor;
    }

    /**
     * @return int
     */
    public function getIdAuthor(): int
    {
        return $this->idAuthor;
    }

    /**
     * @return string
     */
    public function getNameAuthor(): string
    {
        return $this->nameAuthor;
    }


}