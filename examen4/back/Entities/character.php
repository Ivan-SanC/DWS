<?php
include_once "location.php";
include_once "episode.php";

class character
{
    public int $idCharacter;
    public string $nameCharacter;
    public string $status;
    public string $specie;
    public location $origin;
    public location $location;
    public array $episodes;

    /**
     * @param int $idCharacter
     * @param string $nameCharacter
     * @param string $status
     * @param string $specie
     * @param location $origin
     * @param location $location
     * @param array $episodes
     */
    public function __construct(int $idCharacter, string $nameCharacter, string $status, string $specie, location $origin, location $location, array $episodes)
    {
        $this->idCharacter = $idCharacter;
        $this->nameCharacter = $nameCharacter;
        $this->status = $status;
        $this->specie = $specie;
        $this->origin = $origin;
        $this->location = $location;
        $this->episodes = $episodes;
    }

    /**
     * @return int
     */
    public function getIdCharacter(): int
    {
        return $this->idCharacter;
    }

    /**
     * @return string
     */
    public function getNameCharacter(): string
    {
        return $this->nameCharacter;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getSpecie(): string
    {
        return $this->specie;
    }

    /**
     * @return location
     */
    public function getOrigin(): location
    {
        return $this->origin;
    }

    /**
     * @return location
     */
    public function getLocation(): location
    {
        return $this->location;
    }

    /**
     * @return array
     */
    public function getEpisodes(): array
    {
        return $this->episodes;
    }


}