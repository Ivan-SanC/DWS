<?php
include_once "../DBO/dbo.php";
include_once "../Entities/user.php";

class loginModel
{
    public dbo $db;

    /**
     * @param dbo $db
     */
    public function __construct()
    {
        $this->db=new dbo();
    }

    public function  getUser($mail,$pass){
        $sql="select * from user where mail='".$mail."';";
        $this->db->default();
        $query=$this->db->query($sql);
        $this->db->close();
        if($result=$query->fetch_assoc()){
            if(crypt($pass,$result["password"])==$result["password"]){
                return new user($result["user_id"],$result["mail"],$result["password"]);
            }
        }
        return new user(0,"-","-");
    }

}