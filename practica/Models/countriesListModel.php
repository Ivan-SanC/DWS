<?php
include_once "../DBO/dbo.php";
include_once "../Entities/city.php";
include_once "../Entities/countrylanguage.php";
include_once "../Entities/user.php";
include_once "../Entities/country.php";

class countriesListModel
{
    private dbo $db;

    /**
     * @param dbo $db
     */
    public function __construct()
    {
        $this->db = new dbo();
    }

    public function getUser($id)
    {
        if (!is_null($id)) {
            $sql = "SELECT * FROM users WHERE Id = " . $id;
            $this->db->default();
            $query = $this->db->query($sql);
            $this->db->close();
            $result = $query->fetch_assoc();
            return new user($result["Id"], $result["Mail"], $result["Password"]);
        }
        return new user(0, "-", "-");
    }

    public function getNumLang($code){
        $sql="select count(Language) from countrylanguages where CountryCode='".$code."';";
        $this->db->default();
        $query=$this->db->query("$sql");
        $this->db->close();
        $result=$query->fetch_assoc();
        return $result["count(Language)"];
    }

    public function  getNumCities($code){
        $sql="select count(countryCode) from countrylanguages where CountryCode='".$code."';";
        $this->db->default();
        $query=$this->db->query("$sql");
        $this->db->close();
        $result=$query->fetch_assoc();
        return $result["count(countryCode)"];

    }

    public function getMyCountries($userId){
        $sql="select * from countries where UserId=".$userId;
        $this->db->default();
        $query=$this->db->query("$sql");
        $this->db->close();
        $object=array();
        while ($result=$query->fetch_assoc()){
            $object[]=new country($result["Code"],$result["Name"],$result["Population"],$result["GNP"],
                $this->getNumLang($result["Code"]),$this->getNumCities($result["Code"]),$this->getUser($result["UserId"]));
        }
        return $object;
    }

    public function getOtherCountries($userId){
        $sql="select * from countries where NOT UserId='".$userId."' or UserId is null;";
        $this->db->default();
        $query=$this->db->query("$sql");
        $this->db->close();
        $object=array();
        while ($result=$query->fetch_assoc()){
            $object[]=new country($result["Code"],$result["Name"],$result["Population"],$result["GNP"],
                $this->getNumLang($result["Code"]),$this->getNumCities($result["Code"]),$this->getUser($result["UserId"]));
        }
        return $object;
    }

    public function getMyAttack($userId){
        $sql="select sum(Population + GNP) from countries where UserId=".$userId;
        $this->db->default();
        $query=$this->db->query($sql);
        $this->db->close();
        $result=$query->fetch_assoc();
        return $result["sum(Population + GNP)"];


    }
    public function getOtherAttack($code){
        $sql="select sum(Population + GNP) from countries where Code='".$code."';";
        $this->db->default();
        $query=$this->db->query($sql);
        $this->db->close();
        $result=$query->fetch_assoc();
        return $result["sum(Population + GNP)"];

    }

    public function updateUser($code, $userId)
    {
        $sql ="update countries set UserId='".$userId."' where Code='".$code."';";
        $this->db->default();
        $this->db->query($sql);
        if($this->db->affected_rows>0){
            $this->db->close();
            return true;
        }
        $this->db->close();
        return true;
    }

    }