<?php

class episodes
{
    private $id;
    private $name;
    private $air_date;
    private $episode;
    private $created;
    private $characters;


    public function __construct($id,$name,$air_date,$episode,$created,$characters)
    {
        $this->id = $id;
        $this->name=$name;
        $this->air_date=$air_date;
        $this->episode=$episode;
        $this->created=$created;
        $this->characters=$characters;
    }


    //ID
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    //Name
    public  function  getName(){
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    //AirDate
    public function getAirDate()
    {
        return $this->air_date;
    }

    public function setAirDate($air_date)
    {
        $this->air_date = $air_date;
    }


    //Episode
    public function getEpisode()
    {
        return $this->episode;
    }

    public function setEpisode($episode)
    {
        $this->episode = $episode;
    }


    //Created
    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }


    //Characters
    public function getCharacters()
    {
        return $this->characters;
    }

    public function setCharacters($characters)
    {
        $this->characters = $characters;
    }

}