<?php

class distritos
{
    private $id;
    private $name;
    private $delegates;

    public function __construct($id,$name,$delegates)
    {
        $this->id=$id;
        $this->name=$name;
        $this->delegates=$delegates;

    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }


    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }


    public function setDelegates($delegates)
    {
        $this->delegates = $delegates;
    }

    public function getDelegates()
    {
        return $this->delegates;
    }

}