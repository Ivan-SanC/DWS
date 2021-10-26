<?php

class characters
{
    private $id;
    private $name;
    private $status;
    private $species;
    private $type;
    private $gender;
    private $origin;
    private $location;
    private $image;
    private $episodes;


    //Constructor
    public function __construct($id,$name,$status,$species,$type,$gender,$origin,$location,$image,array $episodes)
    {
        $this->id=$id;
        $this->name=$name;
        $this->status=$status;
        $this->species=$species;
        $this->type=$type;
        $this->gender=$gender;
        $this->origin=$origin;
        $this->location=$location;
        $this->image=$image;
        $this->episodes=$episodes;

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


    //NAME
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    //STATUS
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }


    //SPECIES
    public function getSpecies()
    {
        return $this->species;
    }

    public function setSpecies($species)
    {
        $this->species = $species;
    }


    //TYPE
    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }


    //GENDER
    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }


    //ORIGIN
    public function getOrigin()
    {
        return $this->origin;
    }

    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }


    //LOCATIONS
    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }


    //IMAGE
    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }


    //EPISODES
    public function getEpisodes()
    {
        return $this->episodes;
    }

    public function setEpisodes($episodes)
    {
        $this->episodes = $episodes;
    }


}