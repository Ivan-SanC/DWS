<?php

require_once "../DB/dbo.php";
require_once "../Entities/user.php";

class registerModel
{
    protected dbo $db;

    /**
     * @param dbo $db
     */
    public function __construct()
    {
        $this->db = new dbo();
    }

    public function checkUser($email,$name){
        $sql="SELECT * FROM table_users WHERE nameUser='".$name."' OR emailUser='".$email."'";
        $this->db->default();
        $query=$this->db->query($sql);
        $this->db->close();
        if($query->num_rows > 0){
            while ($result = $query->fetch_assoc()) {
                if ($result["nameUser"] == $name) {
                    return $name;
                } else {
                    return $email;
                }
            }
        }
        return false;

    }

    public function  insertUser($email,$name,$pass){
        $sql='INSERT INTO table_users (nameUser,passUser,emailUser) VALUES ("'.$name.'","'.$pass.'","'.$email.'")';
        $this->db->default();
        $this->db->query($sql);
        if ($this->db->insert_id > 0) {
            $this->db->close();
            return true;
        }
        $this->db->close();
        return false;
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
            }
        }
        return new user(0, "-", "-","-");
    }
}