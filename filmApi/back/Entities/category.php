<?php

class category
{
    public int  $idCategory;
    public string $nameCategory;

    /**
     * @param int $idCategory
     * @param string $nameCategory
     */
    public function __construct(int $idCategory, string $nameCategory)
    {
        $this->idCategory = $idCategory;
        $this->nameCategory = $nameCategory;
    }

    /**
     * @return int
     */
    public function getIdCategory(): int
    {
        return $this->idCategory;
    }

    /**
     * @return string
     */
    public function getNameCategory(): string
    {
        return $this->nameCategory;
    }


}