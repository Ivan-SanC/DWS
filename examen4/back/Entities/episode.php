<?php

class episode
{
    public int $idEpisode;
    public string $name;
    public string $episode;

    /**
     * @param int $idEpisode
     * @param string $name
     * @param string $episode
     */
    public function __construct(int $idEpisode, string $name, string $episode)
    {
        $this->idEpisode = $idEpisode;
        $this->name = $name;
        $this->episode = $episode;
    }

    /**
     * @return int
     */
    public function getIdEpisode(): int
    {
        return $this->idEpisode;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEpisode(): string
    {
        return $this->episode;
    }


}