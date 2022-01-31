<?php
require_once "../DB/dbo.php";
require_once "../Entities/user.php";

class loginModel
{
    protected dbo $db;

    /**
     * @param dbo $db
     */
    public function __construct()
    {
        $this->db = new dbo();
    }

    public function getUser($name, $pass): user
    {
        $sql = "SELECT * FROM table_users WHERE nameUser = '" . $name . "';";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        if ($result = $query->fetch_assoc()) {
            if (crypt($pass, $result["passUser"]) == $result["passUser"]) {
                return new user($result["idUser"], $result["nameUser"], $result["passUser"],$result["emailUser"]);
            }else{
                return new user(0, $result["nameUser"], $result["passUser"],$result["emailUser"]);
            }
        }
        return new user(0, $name, $pass,"-");
    }



}