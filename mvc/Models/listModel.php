<?php
require_once "../Entities/city.php"; //
require_once "../Entities/country.php"; //
require_once "../Entities/hotel.php";
require_once "../Entities/neighbor.php"; //
require_once "../Entities/service.php";
require_once "../Entities/source.php"; //
require_once "../Entities/state.php"; //
require_once "../DB/dbo.php";


class listModel
{
    private dbo $db;

    /**
     * @param dbo $db
     */
    public function __construct()
    {
        $this->db = new dbo();
    }

    public function getCountry($idCountry){
        $sql="SELECT * FROM table_country WHERE id=".$idCountry;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        $objCountry= new country($result["id"],$result["nameCountry"]);
        return $objCountry;
    }

    public function getState($idState){
        $sql="SELECT * FROM table_state WHERE id=".$idState;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        $objState= new state($result["id"],$result["nameState"]);
        return $objState;
    }

    public function getCity($idCity){
        $sql="SELECT * FROM table_city WHERE id=".$idCity;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        $objCity = new city($result["id"], $result["nameCity"]);
        return $objCity;
    }

    public function getNeighbor($idNeighbor){
        $sql="SELECT * FROM table_neighbor WHERE id=".$idNeighbor;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        $objNeighbor= new neighbor($result["id"],$result["nameNeighbor"],$result["zip"]);
        return $objNeighbor;
    }

    public function  getSources($idHotel){
        $sql = "SELECT * FROM table_images WHERE idHotel= " . $idHotel;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $objSources = array();
        while ($result = $query->fetch_assoc()) {
            $objSources[]= new source($result["idHotel"],$result["url"]);
        }
        return $objSources;
    }

    public function getServices($idHotel){
        $sql="SELECT s.id, s.nameService FROM table_services as s INNER JOIN table_hotelxservices ON s.id=idService WHERE idHotel=".$idHotel;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $objService = array();
        while ($result = $query->fetch_assoc())  {
            $objService[] = new service($result["id"], $result["nameService"]);
        }
        return $objService;
    }

    public function getHotels(){
        $sql="SELECT * FROM table_hotels";
        $this->db->default();
        $query=$this->db->query($sql);
        $this->db->close();
        $objHotels = array();
        while ($result = $query->fetch_assoc()) {
            $objHotels[] = new hotel($result["id"], $result["nameHotel"],$result["starsHotel"],$this->getCountry($result["idCountry"]),$this->getState($result["idState"]),
                $this->getCity($result["idCity"]),$this->getNeighbor($result["idNeighbor"]),$this->getNeighbor($result["idNeighbor"]),$result["description"],$this->getSources($result["id"]),
                $this->getServices($result["id"]));
        }
        return $objHotels;

    }

    public function getHotel($idHotel){
        $sql="SELECT * FROM table_hotel WHERE id=".$idHotel;
        $this->db->default();
        $query=$this->db->query($sql);
        $this->db->close();
        $result=$query->fetch_assoc();
        $objHotel= new hotel($result["id"], $result["nameHotel"],$result["starsHotel"],$this->getCountry($result["idCountry"]),$this->getState($result["idState"]),
            $this->getCity($result["idCity"]),$this->getNeighbor($result["idNeighbor"]),$this->getNeighbor($result["idZip"]),$result["description"],$this->getSources(["id"]),
            $this->getServices($result["id"]));

        return $objHotel;
    }

}