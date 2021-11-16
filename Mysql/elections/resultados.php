<?php

class resultados
{
    private $distrito;
    private $partido;
    private $votos;
    private $escanyos;



    public function __construct($distrito, $partido, $votos, $escanyos)
    {
        $this->distrito = $distrito;
        $this->partido = $partido;
        $this->votos = $votos;
        $this->escanyos=$escanyos;
    }


    //NAME
    public function setDistrito($distrito)
    {
        $this->$distrito = $distrito;
    }

    public function getDistrito()
    {
        return $this->distrito;
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

    //ESCANYOS
    public function setEscanyos($escanyos){
        $this->escanyos=$escanyos;
    }

    public function getEscanyos()
    {
        return $this->escanyos;
    }
}