<?php

include_once "author.php";
include_once "genre.php";
include_once "source.php";
include_once "movie.php";



class dbo extends mysqli
{
    protected string $hostname="localhost";
    protected string $username="root";
    protected string $password="Pascal.69";
    protected string $database="db_movies";

    public function default(){
        $this->local();
    }

    public function local()
    {
        parent::__construct($this->hostname, $this->username, $this->password, $this->database);

        if(mysqli_connect()){
            die("Error Database". mysqli_connect_error());
        }
    }


}