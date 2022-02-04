<?php

use DB\dbo;
use Entities\user;

include_once "../Entities/user.php";
include_once "../DBO/dbo.php";

class signupModel
{
    private dbo $db;

    /**
     * @param dbo $db
     */
    public function __construct()
    {
        $this->db = new dbo();
    }

    public function getUser($mail, $pass)
    {
        $sql = "SELECT * FROM users where Mail='" . $mail . "';";
        $this->db->default();
        $query = $this->db->query($sql);
        if ($result = $query->fetch_assoc()) {
            if (crypt($pass, $result["Password"]) == $result["Password"]) {
                return new user($result["Id"], $result["Mail"], $result["Password"]);
            }
        }
        return new user(0, "-", "-");
    }

    public function checkUser($mail)
    {
        $sql = "SELECT * FROM users where Mail='" . $mail . "';";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        if ($query->num_rows == 0) {
            return false;
        }
        return true;
    }

    public function insertUser($mail, $pass)
    {
        $sql = "insert into users (Mail,Password) values ('" . $mail . "','" . $pass . "');";
        $this->db->default();
        $this->db->query($sql);
        if ($this->db->insert_id > 0) {
            $this->db->close();
            return true;
        }
        $this->db->close();
        return false;
    }

    public function randomCode()
    {
        $sql = "select Code from countries where UserId is null order by rand() limit 1;";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $result = $query->fetch_assoc();
        return $result["Code"];
    }

    public function randomUser($code, $userId)
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