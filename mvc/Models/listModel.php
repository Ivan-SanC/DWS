<?php
require_once "../Entities/city.php"; //
require_once "../Entities/country.php"; //
require_once "../Entities/hotel.php";
require_once "../Entities/neighbor.php"; //
require_once "../Entities/service.php";//
require_once "../Entities/source.php"; //
require_once "../Entities/state.php"; //
require_once "../DB/dbo.php";


class listModel
{
    private dbo $db;

    /**
     * @param dbo $db
     */
    public function __construct(dbo $db)
    {
        $this->db = $db;
    }

    public function getCity($idCity){
        $sql="SELECT * FROM TABLE table_city where id=".$idCity;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        $objCity = new city($result["id"], $result["nameCity"]);
        return $objCity;
    }

    public function getCountry($idCountry){
        $sql="SELECT * FROM TABLE table_country where id=".$idCountry;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        $objCountry= new country($result["id"],$result["nameCountry"]);
        return $objCountry;
    }

    public function getNeighbor($idNeighbor){
        $sql="SELECT * FROM TABLE table_neighbor where id=".$idNeighbor;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        $objNeighbor= new neighbor($result["id"],$result["nameNeighbor"]);
        return $objNeighbor;
    }

    public function getState($idState){
        $sql="SELECT * FROM TABLE table_state where id=".$idState;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        $objState= new state($result["id"],$result["nameState"]);
        return $objState;
    }

    public function  getSource($idHotel){
        $sql="SELECT * FROM TABLE table_images where idHotel=".$idHotel;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $objSources= array();
        while ($result = $query->fetch_assoc()) {
            $objSources[]= new source($result["idHotel"],$result["url"]);
        }
        return $objSources;
    }

    public function getService($idHotel)
    {
        $sql = "SELECT * FROM TABLE table_images INNER JOIN table_hotelxservices ON id=idService WHERE idHotel=" . $idHotel;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $objService = array();
        while ($result = $query->fetch_assoc()) {
            $objService[] = new service($result["id"], $result["nameService"]);
        }
        return $objService;
    }

    //hotel y hoteles
    public function  getHotels()
    {
        $sql = "SELECT * FROM table_movies";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $objHotels = array();
        while ($result = $query->fetch_assoc()) {
            $objHotels[] = new hotel($result["id"], $result["nameHotel"],$result["starsHotel"]);
        }
        return $objHotels;
    }
}