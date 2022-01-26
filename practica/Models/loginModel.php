<?php
include_once "../DBO/dbo.php";
include_once "../Entities/user.php";

class loginModel
{
    private dbo $db;

    /**
     * @param dbo $db
     */
    public function __construct()
    {
        $this->db = new dbo();
    }

    public function getUser($mail,$pass){
        $sql="SELECT * FROM users where Mail='".$mail."';";
        $this->db->default();
        $query=$this->db->query($sql);
        $this->db->close();
        if ($result=$query->fetch_assoc()){
            if (crypt($pass,$result["Password"])==$result["Password"]){
                return new user($result["Id"],$result["Mail"],$result["Password"]);
            }else{
                return new user(0,$result["Mail"],$result["Password"]);
            }
        }
        return new user(0,$mail,$pass);
    }


}