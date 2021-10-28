<?php

class distritos
{
    private $name;
    private $partido;
    private $votos;


    public function __construct($name, $partido, $votos)
    {
        $this->name = $name;
        $this->partido = $partido;
        $this->votos = $votos;

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


    //PARTIDO
    public function setPartido($partido)
    {
        $this->partido = $partido;
    }

    public function getPartido()
    {
        return $this->partido;
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
}