<?php
require_once "../Entities/city.php";
require_once "../Entities/country.php";
require_once "../Entities/hotel.php";
require_once "../Entities/neighbor.php";
require_once "../Entities/service.php";
require_once "../Entities/source.php";
require_once "../Entities/state.php";
require_once "../Entities/user.php";
require_once "../DB/dbo.php";

class singleHotelModel
{
    public dbo $db;

    /**
     * @param dbo $db
     */
    public function __construct()
    {
        $this->db = new dbo();
    }

    public function getCountry($idCountry)
    {
        $sql = "SELECT * FROM table_country WHERE id=" . $idCountry;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        $objCountry = new country($result["id"], $result["nameCountry"]);
        return $objCountry;
    }

    public function getState($idState)
    {
        $sql = "SELECT * FROM table_state WHERE id=" . $idState;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        $objState = new state($result["id"], $result["nameState"]);
        return $objState;
    }

    public function getCity($idCity)
    {
        $sql = "SELECT * FROM table_city WHERE id=" . $idCity;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        $objCity = new city($result["id"], $result["nameCity"]);
        return $objCity;
    }

    public function getNeighbor($idNeighbor)
    {
        $sql = "SELECT * FROM table_neighbor WHERE id=" . $idNeighbor;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        $objNeighbor = new neighbor($result["id"], $result["nameNeighbor"], $result["zip"]);
        return $objNeighbor;
    }

    public function getSources($idHotel)
    {
        $sql = "SELECT * FROM table_images WHERE idHotel= " . $idHotel;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $objSources = array();
        while ($result = $query->fetch_assoc()) {
            $objSources[] = new source($result["idHotel"], $result["url"]);
        }
        return $objSources;
    }

    public function getServices($idHotel)
    {
        $sql = "SELECT s.id, s.nameService FROM table_services as s INNER JOIN table_hotelxservices ON s.id=idService WHERE idHotel=" . $idHotel;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $objService = array();
        while ($result = $query->fetch_assoc()) {
            $objService[] = new service($result["id"], $result["nameService"]);
        }
        return $objService;
    }

    public function getHotel($idHotel)
    {
        $sql = "SELECT * FROM table_hotels WHERE id=" . $idHotel;
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        $objHotel = new hotel($result["id"], $result["nameHotel"], $result["starsHotel"], $this->getCountry($result["idCountry"]), $this->getState($result["idState"]),
            $this->getCity($result["idCity"]), $this->getNeighbor($result["idNeighbor"]), $this->getNeighbor($result["idNeighbor"]),$result["rooms"],$result["price"], $result["description"], $this->getSources($result["id"]),
            $this->getServices($result["id"]));

        return $objHotel;
    }


    public function checkDates($start,$end,$idHotel){
        $sql="select b.id, b.idHotel, b.idUser, b.fecha, h.rooms, h.rooms-count(b.idUser) as disponibilidad ";
        $sql.="from table_booking as b, table_hotels as h where b.idHotel='".$idHotel."' and b.fecha between '".$start."' and '".$end."' and h.id='".$idHotel."' group by b.fecha;";
        $this->db->default();
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $query=$this->db->query($sql);
        $this->db->close();
        while ($result=$query->fetch_assoc()){
            if($result["disponibilidad"]<=0){
                return false;
            }
        }
        return  true;
    }

    public function insertBooking($date,$idHotel,$idUser){
        $sql="insert into table_booking (idHotel,idUser,fecha) values ('".$idHotel."','".$idUser."','".$date."');";
        $this->db->default();
        $this->db->query($sql);
        $errorSql = $this->db->error->getMessage();
        if($this->db->insert_id>0){
            $this->db->close();
            return true;
        }
        $this->db->close();
        return $errorSql;
        return  false;

    }

}


//SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));
//select b.id,b.idHotel,b.idUser, b.fecha, h.rooms, h.rooms-count(b.idUser) as disponiblidad from table_booking as b, table_hotels as h where b.idHotel=1 and b.fecha between "2022-01-30" and '2022-02-02' and h.id=1 group by fecha;
//SELECT * FROM table_booking WHERE ('2022-01-30' <= fecha AND fecha <= '2022-02-01');
//select b.id,b.idHotel,b.idUser, b.fecha, h.rooms,h.rooms-count(b.idUser) as disponibilidad from table_booking as b, table_hotels as h where b.idHotel=1 and b.fecha ="2022-01-30" and h.id=1;
