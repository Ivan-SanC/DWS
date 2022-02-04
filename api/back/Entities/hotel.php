<?php
class hotel
{
    public int $idHotel;
    public string $nameHotel;
    public string $starsHotel;
    public country $country;
    public state $state;
    public city $city;
    public neighbor $neighbor;
    public neighbor $zip;
    public int $rooms;
    public int $price;
    public string $description;
    public array $sources;
    public array $services;


    /**
     * @param int $idHotel
     * @param string $nameHotel
     * @param string $starsHotel
     * @param country $country
     * @param state $state
     * @param city $city
     * @param neighbor $neighbor
     * @param neighbor $zip
     * @param int $rooms
     * @param int $price
     * @param string $description
     * @param array $sources
     * @param array $services
     */
    public function __construct(int $idHotel, string $nameHotel, string $starsHotel, country $country, state $state, city $city, neighbor $neighbor, neighbor $zip, int $rooms, int $price, string $description, array $sources, array $services)
    {
        $this->idHotel = $idHotel;
        $this->nameHotel = $nameHotel;
        $this->starsHotel = $starsHotel;
        $this->country = $country;
        $this->state = $state;
        $this->city = $city;
        $this->neighbor = $neighbor;
        $this->zip = $zip;
        $this->rooms = $rooms;
        $this->price = $price;
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
     * @return int
     */
    public function getRooms(): int
    {
        return $this->rooms;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
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