<?php
include_once "../DBO/dbo.php";
include_once "../Entities/user.php";


class signupModel
{

    public dbo $db;

    /**
     * @param dbo $db
     */
    public function __construct()
    {
        $this->db=new dbo();
    }

    public function checkUser($mail){
        $sql="select * from user where mail='".$mail."';";
        $this->db->default();
        $query=$this->db->query($sql);
        if($query->num_rows>0){
            $this->db->close();
            return true;
        }
        $this->db->close();
        return false;
    }

    public function insertUser($mail,$pass){
        $sql="insert into user (mail,password) values ('".$mail."','".$pass."');";
        $this->db->default();
        $this->db->query($sql);
        if($this->db->insert_id>0){
            $this->db->close();
            return true;
        }
        $this->db->close();
        return false;
    }

}