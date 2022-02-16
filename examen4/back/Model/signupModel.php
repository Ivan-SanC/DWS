<?php
include_once "../DB/dbo.php";
include_once "../Entities/user.php";
class signupModel
{
    protected dbo $dbo;

    /**
     * @param dbo $dbo
     */
    public function __construct()
    {
        $this->dbo =new dbo();
    }

    public function checkUser($mail){
        $sql="select * from users where mail='".$mail."';";
        $this->dbo->default();
        $query=$this->dbo->query($sql);
        if($query->num_rows>0){
            $this->dbo->close();
            return true;
        }
        $this->dbo->close();
        return false;
    }

    public function insertUser($mail,$pass){
        $sql="insert into users (mail,password) values('".$mail."','".$pass."') ";
        $this->dbo->default();
        $this->dbo->query($sql);
        if ($this->dbo->insert_id>0){
            $this->dbo->close();
            return true;
        }
        $this->dbo->close();
        return false;
    }

}