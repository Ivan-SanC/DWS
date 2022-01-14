<?php

class source
{

    protected int $idHotel;
    protected string $url;


    /**
     * @param int $idHotel
     * @param string $url
     */
    public function __construct(int $idHotel, string $url)
    {
        $this->idHotel = $idHotel;
        $this->url = $url;
    }


    /**
     * @return int
     */
    public function getIdHotel(): int
    {
        return $this->idHotel;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }


}