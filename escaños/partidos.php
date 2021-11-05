<?php

class partidos
{
    private $id;
    private $name;
    private $acronimo;
    private $logo;
    private $votos;
    private $escanyos;


    public function __construct($id, $name, $acronimo, $logo, $votos, $escanyos)
    {
        $this->id = $id;
        $this->name = $name;
        $this->acronimo = $acronimo;
        $this->logo = $logo;
        $this->votos=$votos;
        $this->escanyos=$escanyos;
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


    //ACRONIMO
    public function setAcronimo($acronimo)
    {
        $this->acronimo = $acronimo;
    }

    public function getAcronimo()
    {
        return $this->acronimo;
    }


    //LOGO
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function getLogo()
    {
        return $this->logo;
    }


    //VOTOS
    public function setVotos($votos)
    {
        $this->votos = $votos;
    }


    public function getVotos()
    {
        return $this->votos;
    }


    //ESCAÑOS
    public function setEscanyos($escanyos)
    {
        $this->escanyos = $escanyos;
    }

    public function getEscanyos()
    {
        return $this->escanyos;
    }
}