<?php

class location
{
    private $id;
    private $name;
    private $type;
    private $dimension;
    private $created;
    private $residents;

    //Constructor
    public function __construct($id,$name,$type,$dimension, $created,$residents)
    {
        $this->id = $id;
        $this->name=$name;
        $this->type=$type;
        $this->dimension=$dimension;
        $this->created=$created;
        $this->residents=$residents;

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


    //TYPE
    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }


    //DIMENSION
    public function getDimension()
    {
        return $this->dimension;
    }

    public function setDimension($dimension)
    {
        $this->dimension = $dimension;
    }


    //CREATED
    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }


    //RESIDENTS
    public function setResidents($residents)
    {
        $this->residents = $residents;
    }

    public function getResidents()
    {
        return $this->residents;
    }
}