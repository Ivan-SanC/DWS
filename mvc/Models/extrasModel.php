<?php

include_once "../DB/dbo.php";
include_once "../Entities/comment.php";
include_once "../Entities/user.php";
class extrasModel
{
    private dbo $db;

    /**
     * @param dbo $db
     */
    public function __construct()
    {
        $this->db = new dbo();
    }

    public function insertComments($idHotel,$idUser, $comment)
    {
        $sql = "INSERT INTO table_comments (idHotel,idUser,comment) VALUES('" . $idHotel . "','" . $idUser . "','" . $comment . "');";
        $this->db->default();
        $this->db->query($sql);
        if ($this->db->insert_id > 0) {
            $this->db->close();
            return true;
        }
        $this->db->close();
        return false;

    }


    public function getComments($idHotel)
    {
        $sql = "SELECT c.comment, u.nameUser FROM table_comments as c INNER JOIN table_users as u ON c.idUser=u.idUser WHERE c.idHotel='" . $idHotel . "' ORDER BY id DESC";
        $this->db->default();
        $query = $this->db->query($sql);
        $this->db->close();
        $objComments = array();
        while ($result = $query->fetch_assoc()) {
            $objComments[] = new comment($result["nameUser"], $result["comment"]);
        }
        return $objComments;
    }
}