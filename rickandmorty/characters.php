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
    public function __construct($id,$name,$status,$species,$type,$gender,$origin,$location,$image,$episodes)
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

    /**
     * @return mixed
     */
    public function getSpecies()
    {
        return $this->species;
    }

    /**
     * @param mixed $species
     */
    public function setSpecies($species)
    {
        $this->species = $species;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param mixed $origin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getEpisodes()
    {
        return $this->episodes;
    }

    /**
     * @param mixed $episodes
     */
    public function setEpisodes($episodes)
    {
        $this->episodes = $episodes;
    }




    //SPECIES
    //TYPE
    //GENDER
    //ORIGIN
    //LOCATION
    //IMAGE
    //EPISODES
}