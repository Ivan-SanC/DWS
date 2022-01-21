<?php
require_once "../Entities/user.php";
require_once "../DB/dbo.php";
class registerModel
{
protected dbo $db;

    /**
     * @param dbo $db
     */
    public function __construct(dbo $db)
    {
        $this->db = $db;
    }

    public function comprobarUser($email,$user){
        $sql='SELECT * FROM table_users WHERE emailUser= "'.$email.'" OR nameUser= "'.$user.'"';

    }

}