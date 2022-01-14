<?php

class hotel
{
    protected int $idHotel;
    protected string $nameHotel;
    protected string $starsHotel;
    protected country $country;
    protected state $state;
    protected city $city;
    protected neighbor $neighbor;
    protected neighbor $zip;
    protected string $description;
    protected array $sources;
    protected array $services;
    // protected int $rating;
    // protected comment $comment;//objeto o array?
    /**
     * @param int $idHotel
     * @param string $nameHotel
     * @param string $starsHotel
     * @param country $country
     * @param state $state
     * @param city $city
     * @param neighbor $neighbor
     * @param neighbor $zip
     * @param string $description
     * @param array $sources
     * @param array $services
     */
    public function __construct(int $idHotel, string $nameHotel, string $starsHotel, country $country, state $state, city $city, neighbor $neighbor, neighbor $zip, string $description, array $sources, array $services)
    {
        $this->idHotel = $idHotel;
        $this->nameHotel = $nameHotel;
        $this->starsHotel = $starsHotel;
        $this->country = $country;
        $this->state = $state;
        $this->city = $city;
        $this->neighbor = $neighbor;
        $this->zip = $zip;
        $this->description = $description;
        $this->sources = $sources;
        $this->services = $services;
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
    public function getNameHotel(): string
    {
        return $this->nameHotel;
    }

    /**
     * @return string
     */
    public function getStarsHotel(): string
    {
        return $this->starsHotel;
    }

    /**
     * @return country
     */
    public function getCountry(): country
    {
        return $this->country;
    }

    /**
     * @return state
     */
    public function getState(): state
    {
        return $this->state;
    }

    /**
     * @return city
     */
    public function getCity(): city
    {
        return $this->city;
    }

    /**
     * @return neighbor
     */
    public function getNeighbor(): neighbor
    {
        return $this->neighbor;
    }

    /**
     * @return neighbor
     */
    public function getZip(): neighbor
    {
        return $this->zip;
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
    public function getSources(): array
    {
        return $this->sources;
    }

    /**
     * @return array
     */
    public function getServices(): array
    {
        return $this->services;
    }


}