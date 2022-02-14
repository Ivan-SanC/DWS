<?php

class language
{
    public int $idLang;
    public string  $nameLang;

    /**
     * @param int $idLang
     * @param string $nameLang
     */
    public function __construct(int $idLang, string $nameLang)
    {
        $this->idLang = $idLang;
        $this->nameLang = $nameLang;
    }

    /**
     * @return int
     */
    public function getIdLang(): int
    {
        return $this->idLang;
    }

    /**
     * @return string
     */
    public function getNameLang(): string
    {
        return $this->nameLang;
    }

}