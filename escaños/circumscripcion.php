<?php

class circumscripcion
{
    private $id;
    private $name;
    private $delegados;

    public function __construct($id, $name, $delegados)
    {
        $this->id = $id;
        $this->name = $name;
        $this->delegados = $delegados;
    }


    //ID
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }


    //NAME
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }


    //DELEGADOS
    public function setDelegados($delegados)
    {
        $this->delegados = $delegados;
    }

    public function getDelegados()
    {
        return $this->delegados;
    }
}