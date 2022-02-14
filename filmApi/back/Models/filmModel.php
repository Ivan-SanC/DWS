<?php
include_once "../DBO/dbo.php";
include_once "../Entities/category.php";
include_once "../Entities/actor.php";
include_once "../Entities/language.php";
include_once "../Entities/film.php";
include_once "../Entities/user.php";


class filmModel
{
    public dbo $db;

    /**
     * @param dbo $db
     */
    public function __construct()
    {
        $this->db=new dbo();
    }

    public function getLang($id){
        $sql="select * from language where language_id=".$id;
        $this->db->default();
        $query=$this->db->query($sql);
        $this->db->close();
        $result=$query->fetch_assoc();
        $obj=new language($result["language_id"],$result["name"]);
        return $obj;

    }

    public function getActors($id){
        $sql="select * from actor a inner join film_actor fa on fa.actor_id=a.actor_id where fa.film_id=".$id;
        $this->db->default();
        $query=$this->db->query($sql);
        $this->db->close();
        $obj=array();
        while ($result=$query->fetch_assoc()){
            $obj[]=new actor($result["actor_id"],$result["first_name"],$result["last_name"]);
        }
        return $obj;

    }

    public function getCategories($id){
        $sql="select * from category c inner join film_category fc on fc.category_id=c.category_id where fc.film_id=".$id;
        $this->db->default();
        $query=$this->db->query($sql);
        $this->db->close();
        $obj=array();
        while ($result=$query->fetch_assoc()){
            $obj[]=new category($result["category_id"],$result["name"]);
        }
        return $obj;

    }
    public function getUser($id){
        if(is_null($id)){
            return new user(0,"-","-");
        }
        $sql="select * from user where user_id=".$id;
        $this->db->default();
        $query=$this->db->query($sql);
        $this->db->close();
        $result=$query->fetch_assoc();
        return new user($result["user_id"],$result["mail"],$result["password"]);


    }

    public function getMyFilms($idUser){
        $sql="select * from film where user_id=".$idUser;
        $this->db->default();
        $query=$this->db->query($sql);
        $this->db->close();
        $obj=array();
        while ($result=$query->fetch_assoc()){
            $obj[]=new film($result["film_id"],$result["title"],$result["description"],$result["release_year"],$this->getLang($result["language_id"]),
            $result["length"],$result["rating"],$this->getActors("film_id"),$this->getCategories("film_id"),$this->getUser($result["user_id"]));
        }
        return $obj;
    }

    public function getOtherFilms(){
        $sql="select * from film where user_id is null ORDER BY RAND(1913) LIMIT 20 ";
        $this->db->default();
        $query=$this->db->query($sql);
        $this->db->close();
        $obj=array();
        while ($result=$query->fetch_assoc()){
            $obj[]=new film($result["film_id"],$result["title"],$result["description"],$result["release_year"],$this->getLang($result["language_id"]),
                $result["length"],$result["rating"],$this->getActors("film_id"),$this->getCategories("film_id"),$this->getUser($result["user_id"]));
        }
        return $obj;

    }

    public function rentFilm($idUser,$idFilm){
        $sql="update film set user_id='".$idUser."' where user_id is null and film_id=".$idFilm;
        $this->db->default();
        $this->db->query($sql);
        if($this->db->affected_rows>0){
            $this->db->close();
            return true;
        }
        $this->db->close();
        return  false;

    }

    public function returnFilm($idUser,$idFilm){
        $sql="update film set user_id=null where user_id=".$idUser." and film_id=".$idFilm.";";
        $this->db->default();
        $this->db->query($sql);
        if($this->db->affected_rows>0){
            $this->db->close();
            return true;
        }
        $this->db->close();
        return  false;

    }

}