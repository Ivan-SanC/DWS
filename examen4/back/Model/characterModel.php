<?php
include_once "../DB/dbo.php";
include_once "../Entities/character.php";
include_once "../Entities/episode.php";
include_once "../Entities/location.php";

class characterModel
{
    protected dbo $dbo;

    /**
     * @param dbo $dbo
     */
    public function __construct()
    {
        $this->dbo =new dbo();
    }
    public function getOrigin($id){
        if(is_null($id)){
            return new location(0,"-","-","-");
        }
        $sql="select * from locations where id=".$id;
        $this->dbo->default();
        $query=$this->dbo->query($sql);
        $this->dbo->close();
        $result=$query->fetch_assoc();
        $obj=new location($result["id"],$result["name"],$result["type"],$result["dimension"]);
        return $obj;


    }
    public function getLocation($id){
        if(is_null($id)){
            return new location(0,"-","-","-");
        }
        $sql="select * from locations where id=".$id;
        $this->dbo->default();
        $query=$this->dbo->query($sql);
        $this->dbo->close();
        $result=$query->fetch_assoc();
        $obj=new location($result["id"],$result["name"],$result["type"],$result["dimension"]);
        return $obj;

    }

    public function getEpisodes($id){
        $sql="select * from episodes e inner join episodes_characters ec on e.id=ec.episode_id where ec.character_id=".$id;
        $this->dbo->default();
        $query=$this->dbo->query($sql);
        $this->dbo->close();
        $obj=array();
        while ($result=$query->fetch_assoc()){
            $obj[]=new episode ($result["id"],$result["name"],$result["episode"]);
        }
        return $obj;

    }

    public function changeLocation($idLocation, $idCharacter){
        $sql="update characters set location=".$idLocation." where id=".$idCharacter;
        $this->dbo->default();
        $this->dbo->query($sql);
        if($this->dbo->insert_id>0){
            $this->dbo->close();
            return true;
        }
        $this->dbo->close();
        return false;
    }

    public function getCharacters(){
        $sql="select * from characters ORDER BY RAND(1234) LIMIT 20";
        $this->dbo->default();
        $query=$this->dbo->query($sql);
        $this->dbo->close();
        $obj=array();
        while ($result=$query->fetch_assoc()){
            $obj[]=new character($result["id"],$result["name"],$result["status"],$result["species"],
                $this->getOrigin($result["origin"]),$this->getLocation($result["location"]),$this->getEpisodes($result["id"]));
        }
        return $obj;
    }

    public function allLocation(){
        $sql="SELECT * FROM locations";
        $this->dbo->default();
        $query=$this->dbo->query($sql);
        $this->dbo->close();
        $obj=array();
        while ($result=$query->fetch_assoc()){
            $obj[]=new location($result["id"],$result["name"],$result["type"],$result["dimension"]);
        }
        return $obj;

    }



}

/*
 L’aplicació només té un requisit funcional, un usuari ha de poder canviar les ubicacions dels personatges
(camp location de la taula characters).

si esta logeado cambia location
select y boton cambiar
 */